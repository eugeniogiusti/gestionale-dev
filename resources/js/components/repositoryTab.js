/**
 * Repository Tab Component
 * Lazy-fetches GitHub data (repo info, commits, commit activity) for the project Repository tab.
 * Data is loaded once on init and cached server-side for 10 minutes.
 */
export default function repositoryTab(url) {
    return {
        url,
        loading: true,
        error: null,
        info: {},
        commits: [],
        activity: [],
        heatmapMonths: [],

        /** Fetch repository data from the Laravel JSON endpoint on tab open */
        init() {
            fetch(this.url, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
            })
                .then(r => r.json())
                .then(data => {
                    if (data.error) {
                        this.error = data.error;
                    } else {
                        this.info     = data.info     || {};
                        this.commits  = data.commits  || [];
                        this.activity = data.activity || [];
                        this.heatmapMonths = this.buildMonthLabels();
                    }
                })
                .catch(() => {
                    this.error = 'Error loading GitHub data.';
                })
                .finally(() => {
                    this.loading = false;
                });
        },

        /** Returns the Tailwind bg class for a heatmap cell based on commit count */
        heatmapColor(count) {
            if (count === 0) return 'bg-gray-100 dark:bg-gray-700';
            if (count <= 3)  return 'bg-emerald-200 dark:bg-emerald-900';
            if (count <= 9)  return 'bg-emerald-400 dark:bg-emerald-700';
            return 'bg-emerald-600 dark:bg-emerald-500';
        },

        /** Returns the tooltip string for a heatmap cell (date + commit count) */
        heatmapTitle(weekTimestamp, dayIndex, count) {
            const d = new Date((weekTimestamp + dayIndex * 86400) * 1000);
            const dateStr = d.toLocaleDateString(undefined, {
                month: 'short',
                day: 'numeric',
                year: 'numeric',
            });
            return `${dateStr}: ${count} commit${count !== 1 ? 's' : ''}`;
        },

        /** Builds the month label array used to render the heatmap header */
        buildMonthLabels() {
            if (!this.activity.length) return [];
            const months = [];
            const monthNames = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            let lastMonth = -1;
            let current = null;

            this.activity.forEach((week, i) => {
                const m = new Date(week.week * 1000).getMonth();
                if (m !== lastMonth) {
                    if (current) months.push(current);
                    current = { label: monthNames[m], col: i, weeks: 1 };
                    lastMonth = m;
                } else if (current) {
                    current.weeks++;
                }
            });
            if (current) months.push(current);
            return months;
        },

        /** Converts an ISO date string to a relative time label (e.g. "2h ago") */
        formatDate(iso) {
            if (!iso) return '';
            const d = new Date(iso);
            const diff = Math.floor((new Date() - d) / 1000);
            if (diff < 60)     return 'just now';
            if (diff < 3600)   return Math.floor(diff / 60) + 'm ago';
            if (diff < 86400)  return Math.floor(diff / 3600) + 'h ago';
            if (diff < 604800) return Math.floor(diff / 86400) + 'd ago';
            return d.toLocaleDateString(undefined, { month: 'short', day: 'numeric' });
        },
    };
}
