import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

export default function annualTrendChart(chartData) {
    return {
        chart: null,
        _resizeObserver: null,

        init() {
            const container = this.$refs.canvas?.parentElement;
            if (!container) return;

            // Re-render only when dark mode actually changes (not on sidebar-collapsed or other class changes)
            let isDark = document.documentElement.classList.contains('dark');
            const mutationObserver = new MutationObserver(() => {
                const nowDark = document.documentElement.classList.contains('dark');
                if (nowDark !== isDark) {
                    isDark = nowDark;
                    this.renderChart();
                }
            });
            mutationObserver.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class']
            });

            // Single ResizeObserver handles:
            // 1. Initial render (when container first gets dimensions)
            // 2. Sidebar collapse/expand transitions (fires on every frame)
            // 3. Window resize
            // responsive: false in Chart.js prevents its internal ResizeObserver
            // from setting canvas to 0x0 during CSS transitions.
            this._resizeObserver = new ResizeObserver((entries) => {
                for (const entry of entries) {
                    const { width, height } = entry.contentRect;
                    if (width > 0 && height > 0) {
                        if (!this.chart) {
                            this.renderChart();
                        } else {
                            this.chart.resize(width, height);
                        }
                    }
                }
            });
            this._resizeObserver.observe(container);
        },

        renderChart() {
            const ctx = this.$refs.canvas;
            if (!ctx) return;

            if (this.chart) {
                this.chart.destroy();
                this.chart = null;
            }

            const isDark = document.documentElement.classList.contains('dark');
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
            const textColor = isDark ? '#9CA3AF' : '#6B7280';

            this.chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: [
                        {
                            label: chartData.translations.payments,
                            data: chartData.payments,
                            backgroundColor: 'rgba(16, 185, 129, 0.8)',
                            borderColor: 'rgb(16, 185, 129)',
                            borderWidth: 1,
                            borderRadius: 4,
                            order: 2
                        },
                        {
                            label: chartData.translations.costs,
                            data: chartData.costs,
                            backgroundColor: 'rgba(239, 68, 68, 0.8)',
                            borderColor: 'rgb(239, 68, 68)',
                            borderWidth: 1,
                            borderRadius: 4,
                            order: 3
                        },
                        {
                            label: chartData.translations.profit,
                            data: chartData.profit,
                            type: 'line',
                            borderColor: 'rgb(99, 102, 241)',
                            backgroundColor: 'rgba(99, 102, 241, 0.1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgb(99, 102, 241)',
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: true,
                            tension: 0.3,
                            order: 1
                        }
                    ]
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: isDark ? '#374151' : '#fff',
                            titleColor: isDark ? '#fff' : '#111827',
                            bodyColor: isDark ? '#D1D5DB' : '#4B5563',
                            borderColor: isDark ? '#4B5563' : '#E5E7EB',
                            borderWidth: 1,
                            padding: 12,
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + chartData.currencySymbol + context.raw.toLocaleString('it-IT', {minimumFractionDigits: 2});
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: textColor
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: gridColor
                            },
                            ticks: {
                                color: textColor,
                                callback: function(value) {
                                    return chartData.currencySymbol + value.toLocaleString('it-IT');
                                }
                            }
                        }
                    }
                }
            });

            // Set canvas to current container size immediately
            const container = ctx.parentElement;
            if (container) {
                this.chart.resize(container.offsetWidth, container.offsetHeight);
            }
        },

        destroy() {
            if (this._resizeObserver) {
                this._resizeObserver.disconnect();
            }
            if (this.chart) {
                this.chart.destroy();
            }
        }
    };
}
