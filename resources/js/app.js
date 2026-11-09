import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('appSidebar');
    const backdrop = document.getElementById('sidebarBackdrop');
    const main = document.getElementById('dashboardMain');

    if (!sidebar) return;

    const toggleButtons = document.querySelectorAll('[data-sidebar-toggle]');
    const closeButtons = document.querySelectorAll('[data-sidebar-close]');

    // Desktop: collapse or expand sidebar
    const toggleDesktopSidebar = () => {
        const isCollapsed = sidebar.classList.contains('lg:w-20');

        const labels = sidebar.querySelectorAll('.sidebar-label');
        const links = sidebar.querySelectorAll('nav a');

        if (isCollapsed) {
            sidebar.classList.remove('lg:w-20');
            sidebar.classList.add('lg:w-64');

            labels.forEach(label => {
                label.classList.remove('lg:hidden');
            });

            links.forEach(link => {
                link.classList.remove('lg:justify-center', 'lg:px-0');
            });

            toggleButtons.forEach(button => {
                button.setAttribute('aria-expanded', 'true');
                button.setAttribute('aria-label', 'Collapse sidebar');
            });

        } else {
            sidebar.classList.remove('lg:w-64');
            sidebar.classList.add('lg:w-20');

            labels.forEach(label => {
                label.classList.add('lg:hidden');
            });

            links.forEach(link => {
                link.classList.add('lg:justify-center', 'lg:px-0');
            });

            toggleButtons.forEach(button => {
                button.setAttribute('aria-expanded', 'false');
                button.setAttribute('aria-label', 'Expand sidebar');
            });
        }
    };

    // Mobile: open sidebar
    const openMobileSidebar = () => {
        sidebar.classList.remove('-translate-x-full');

        if (backdrop) {
            backdrop.classList.remove('hidden');
        }

        document.body.classList.add('overflow-hidden');
    };

    // Mobile: close sidebar
    const closeMobileSidebar = () => {
        sidebar.classList.add('-translate-x-full');

        if (backdrop) {
            backdrop.classList.add('hidden');
        }

        document.body.classList.remove('overflow-hidden');
    };

// Handle sidebar toggle buttons
toggleButtons.forEach(button => {
    button.addEventListener('click', () => {

        // Desktop: Collapse or expand sidebar
        if (window.innerWidth >= 1024) {
            toggleDesktopSidebar();

            const isCollapsed = sidebar.classList.contains('lg:w-20');

            if (main) {
                if (isCollapsed) {
                    main.classList.remove('lg:ml-64');
                    main.classList.add('lg:ml-20');
                } else {
                    main.classList.remove('lg:ml-20');
                    main.classList.add('lg:ml-64');
                }
            }

        } else {
            // Mobile: Open or close sidebar
            const isOpen = !sidebar.classList.contains('-translate-x-full');

            if (isOpen) {
                closeMobileSidebar();
            } else {
                openMobileSidebar();
            }
        }
    });
});

    // Handle close buttons
    closeButtons.forEach(button => {
        button.addEventListener('click', closeMobileSidebar);
    });

    // Close when clicking the backdrop
    if (backdrop) {
        backdrop.addEventListener('click', closeMobileSidebar);
    }

    // Close mobile sidebar using Escape
    document.addEventListener('keydown', event => {
        if (event.key === 'Escape' && window.innerWidth < 1024) {
            closeMobileSidebar();
        }
    });


    // Handle header dropdowns
const dropdownButtons = document.querySelectorAll('[data-header-dropdown]');
const dropdownPanels = document.querySelectorAll('[data-dropdown-panel]');

const closeAllDropdowns = () => {
    dropdownPanels.forEach(panel => {
        panel.classList.add('hidden');
    });

    dropdownButtons.forEach(button => {
        button.setAttribute('aria-expanded', 'false');
    });
};

dropdownButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.stopPropagation();

        const dropdownName = button.dataset.headerDropdown;
        const targetPanel = document.querySelector(
            `[data-dropdown-panel="${dropdownName}"]`
        );

        if (!targetPanel) return;

        const isOpen = !targetPanel.classList.contains('hidden');

        closeAllDropdowns();

        if (!isOpen) {
            targetPanel.classList.remove('hidden');
            button.setAttribute('aria-expanded', 'true');
        }
    });
});

// Close dropdowns when clicking outside
document.addEventListener('click', (event) => {
    if (
        !event.target.closest('[data-header-dropdown]') &&
        !event.target.closest('[data-dropdown-panel]')
    ) {
        closeAllDropdowns();
    }
});

// Close dropdowns with Escape
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        closeAllDropdowns();
    }
});


// ==========================================
// ADMIN DASHBOARD - INTERACTIVE KPI CHARTS
// ==========================================

const kpiCards = document.querySelectorAll('.kpi-card');
const chartCanvas = document.getElementById('adminAnalyticsChart');

if (kpiCards.length > 0 && chartCanvas) {

    const chartTitle = document.getElementById('chartTitle');
    const chartDescription = document.getElementById('chartDescription');
    const chartPeriod = document.getElementById('chartPeriod');
    const chartInsight = document.getElementById('chartInsight');
    const chartWrapper = document.getElementById('chartWrapper');

    let adminChart = null;

    // Temporary chart data
    const chartConfigurations = {

        sales: {
            type: 'line',
            title: 'Sales Performance',
            description: 'Revenue generated throughout the day.',
            period: 'Today',
            insight: 'Sales are performing well today. Revenue is up compared to yesterday.',
            labels: ['8 AM', '10 AM', '12 PM', '2 PM', '4 PM', '6 PM', '8 PM'],
            datasets: [{
                label: 'Sales Revenue',
                data: [1200, 2800, 4100, 3200, 5200, 4600, 3750],
                borderColor: '#A17A51',
                backgroundColor: 'rgba(161, 122, 81, 0.12)',
                fill: true,
                tension: 0.4,
                borderWidth: 3,
                pointRadius: 4,
                pointHoverRadius: 7,
                pointBackgroundColor: '#A17A51'
            }]
        },

        orders: {
            type: 'bar',
            title: 'Order Activity',
            description: 'Number of orders received throughout the day.',
            period: 'Today',
            insight: 'Your busiest period is between 12 PM and 2 PM. Consider preparing additional staff and supplies during this window.',
            labels: ['8 AM', '10 AM', '12 PM', '2 PM', '4 PM', '6 PM', '8 PM'],
            datasets: [{
                label: 'Orders',
                data: [6, 12, 18, 14, 15, 13, 8],
                backgroundColor: '#A17A51',
                hoverBackgroundColor: '#C99A62',
                borderRadius: 7,
                borderSkipped: false,
                barThickness: 25
            }]
        },

        inventory: {
            type: 'doughnut',
            title: 'Inventory Breakdown',
            description: 'Estimated inventory value by product category.',
            period: 'Current Inventory',
            insight: 'Coffee beans and beverage ingredients represent a significant portion of your inventory investment.',
            labels: ['Coffee Beans', 'Milk & Dairy', 'Syrups', 'Packaging', 'Others'],
            datasets: [{
                label: 'Inventory Value',
                data: [65000, 42000, 28500, 24000, 25000],
                backgroundColor: [
                    '#3B281D',
                    '#A17A51',
                    '#C99A62',
                    '#DCC3A5',
                    '#EDE2D5'
                ],
                hoverOffset: 10,
                borderWidth: 3,
                borderColor: '#FFFFFF'
            }]
        },

        lowstock: {
            type: 'bar',
            title: 'Low Stock Monitoring',
            description: 'Current remaining stock of products requiring attention.',
            period: 'Stock Alerts',
            insight: 'Arabica Coffee Beans has the lowest stock. Prioritize replenishment to avoid interrupting beverage production.',
            labels: [
                'Arabica Beans',
                'Whole Milk',
                'Caramel Syrup',
                'Paper Cups',
                'Chocolate Powder',
                'Vanilla Syrup'
            ],
            datasets: [{
                label: 'Remaining Stock',
                data: [3, 4, 5, 8, 6, 7],
                backgroundColor: [
                    '#B84A3A',
                    '#C76A4D',
                    '#C99A62',
                    '#C99A62',
                    '#C99A62',
                    '#C99A62'
                ],
                borderRadius: 6,
                borderSkipped: false,
                barThickness: 20
            }]
        }

    };


    // Format currency values
    const formatCurrency = (value) => {
        return '₱' + Number(value).toLocaleString('en-PH');
    };


    // Create chart based on selected KPI
    const renderChart = (key) => {

        const config = chartConfigurations[key];

        if (!config) return;

        // Animate chart transition
        chartWrapper.classList.add('opacity-0', 'translate-y-2');

        setTimeout(() => {

            if (adminChart) {
                adminChart.destroy();
            }

            // Update chart information
            chartTitle.textContent = config.title;
            chartDescription.textContent = config.description;
            chartPeriod.textContent = config.period;
            chartInsight.lastElementChild.textContent = config.insight;

            // Create new chart
            adminChart = new Chart(chartCanvas, {
                type: config.type,

                data: {
                    labels: config.labels,
                    datasets: config.datasets
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    animation: {
                        duration: 700,
                        easing: 'easeOutQuart'
                    },

                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },

                    plugins: {
                        legend: {
                            display: config.type === 'doughnut',
                            position: 'bottom',

                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle',
                                padding: 20,
                                color: '#796653',
                                font: {
                                    family: 'DM Sans',
                                    size: 11
                                }
                            }
                        },

                        tooltip: {
                            backgroundColor: '#2B1D15',
                            titleColor: '#F8F1E8',
                            bodyColor: '#EAD0A8',
                            padding: 12,
                            cornerRadius: 8,

                            callbacks: {
                                label: (context) => {

                                    const value = context.parsed.y ?? context.parsed;

                                    if (key === 'sales' || key === 'inventory') {
                                        return ' ' + formatCurrency(value);
                                    }

                                    return ' ' + context.dataset.label + ': ' + value;
                                }
                            }
                        }
                    },

                    scales: config.type === 'doughnut' ? {} : {

                        x: {
                            grid: {
                                display: false
                            },

                            ticks: {
                                color: '#927E6D',
                                font: {
                                    family: 'DM Sans',
                                    size: 11
                                }
                            },

                            ...(key === 'lowstock' ? {
                                ticks: {
                                    color: '#927E6D',
                                    font: {
                                        family: 'DM Sans',
                                        size: 11
                                    }
                                }
                            } : {})
                        },

                        y: {
                            beginAtZero: true,

                            grid: {
                                color: 'rgba(233, 222, 209, 0.6)'
                            },

                            ticks: {
                                color: '#927E6D',
                                font: {
                                    family: 'DM Sans',
                                    size: 11
                                },

                                callback: (value) => {
                                    if (key === 'sales') {
                                        return formatCurrency(value);
                                    }

                                    return value;
                                }
                            }
                        },

                        ...(key === 'lowstock' ? {
                            x: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(233, 222, 209, 0.6)'
                                },
                                ticks: {
                                    color: '#927E6D',
                                    stepSize: 2
                                }
                            },
                            y: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#796653'
                                }
                            }
                        } : {})
                    },

                    ...(key === 'lowstock' ? {
                        indexAxis: 'y'
                    } : {})
                }
            });

            // Show chart after rendering
            chartWrapper.classList.remove('opacity-0', 'translate-y-2');

        }, 180);
    };


    // KPI card selection
    kpiCards.forEach(card => {

        card.addEventListener('click', () => {

            const selectedKpi = card.dataset.kpi;

            // Update selected card appearance
            kpiCards.forEach(item => {

                const isSelected = item === card;

                item.setAttribute('aria-pressed', isSelected ? 'true' : 'false');

                if (isSelected) {

                    item.classList.remove(
                        'border-[#E9DED1]',
                        'bg-white'
                    );

                    item.classList.add(
                        'border-[#C99A62]',
                        'bg-[#2B1D15]',
                        'shadow-lg',
                        'shadow-[#211812]/10'
                    );

                    item.querySelectorAll('p').forEach(text => {
                        text.classList.remove('text-[#927E6D]');
                        text.classList.add('text-[#D6C2AE]');
                    });

                    item.querySelector('h3').classList.remove('text-[#2B1D15]', 'text-[#B84A3A]');
                    item.querySelector('h3').classList.add('text-white');

                    item.querySelectorAll('span').forEach(span => {
                        if (span.classList.contains('bg-[#F8F1E8]')) {
                            span.classList.remove('bg-[#F8F1E8]');
                            span.classList.add('bg-[#C99A62]/15');
                        }

                        if (span.classList.contains('bg-[#FFF1ED]')) {
                            span.classList.remove('bg-[#FFF1ED]');
                            span.classList.add('bg-[#C99A62]/15');
                        }
                    });

                } else {

                    item.classList.remove(
                        'border-[#C99A62]',
                        'bg-[#2B1D15]',
                        'shadow-lg',
                        'shadow-[#211812]/10'
                    );

                    item.classList.add(
                        'border-[#E9DED1]',
                        'bg-white'
                    );

                    item.querySelectorAll('p').forEach(text => {
                        text.classList.remove('text-[#D6C2AE]');
                        text.classList.add('text-[#927E6D]');
                    });

                    const heading = item.querySelector('h3');
                    heading.classList.remove('text-white');

                    if (item.dataset.kpi === 'lowstock') {
                        heading.classList.add('text-[#B84A3A]');
                    } else {
                        heading.classList.add('text-[#2B1D15]');
                    }

                    item.querySelectorAll('span').forEach(span => {
                        span.classList.remove('bg-[#C99A62]/15');

                        if (item.dataset.kpi === 'lowstock') {
                            if (span.classList.contains('text-[#B84A3A]')) {
                                span.classList.add('bg-[#FFF1ED]');
                            }
                        } else {
                            span.classList.add('bg-[#F8F1E8]');
                        }
                    });
                }

            });

            renderChart(selectedKpi);

        });

    });


    // Load sales chart by default
    renderChart('sales');

}

});
