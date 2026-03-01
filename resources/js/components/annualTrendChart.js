import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

export default function annualTrendChart(chartData) {
    return {
        chart: null,

        init() {
            const container = this.$refs.canvas?.parentElement;

            if (container && container.offsetWidth > 0 && container.offsetHeight > 0) {
                this.renderChart();
            } else if (container) {
                // Use ResizeObserver to detect when container gets real dimensions
                const ro = new ResizeObserver((entries) => {
                    for (const entry of entries) {
                        if (entry.contentRect.width > 0 && entry.contentRect.height > 0) {
                            ro.disconnect();
                            this.renderChart();
                            break;
                        }
                    }
                });
                ro.observe(container);
            }

            // Watch for dark mode changes
            const observer = new MutationObserver(() => {
                this.renderChart();
            });
            observer.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class']
            });

            // Re-render after sidebar transition ends
            const sidebar = document.querySelector('.sidebar-element');
            if (sidebar) {
                sidebar.addEventListener('transitionend', (e) => {
                    if (e.propertyName === 'width' && this.chart) {
                        requestAnimationFrame(() => {
                            this.chart.resize();
                        });
                    }
                });
            }
        },

        renderChart() {
            const ctx = this.$refs.canvas;
            if (!ctx) return;

            // Verify container still has valid dimensions
            const container = ctx.parentElement;
            if (!container || container.offsetWidth === 0 || container.offsetHeight === 0) {
                console.warn('Chart container has invalid dimensions, skipping render');
                return;
            }

            if (this.chart) {
                this.chart.destroy();
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
                    responsive: true,
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
        },

        destroy() {
            if (this.chart) {
                this.chart.destroy();
            }
        }
    };
}
