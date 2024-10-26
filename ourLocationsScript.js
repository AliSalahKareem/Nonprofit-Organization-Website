Highcharts.mapChart('container', {
    chart: {
        map: 'countries/iq/iq-all'
    },

    title: {
        text: 'Map of Iraq'
    },

    subtitle: {
        text: 'A simple map chart example'
    },

    series: [{
        data: [
            { 'hc-key': 'iq-001', value: 10 }, // Example data point
            { 'hc-key': 'iq-002', value: 20 }, // Example data point
            { 'hc-key': 'iq-003', value: 30 }  // Example data point
        ],
        name: 'Random data',
        states: {
            hover: {
                color: '#BADA55'
            }
        },
        dataLabels: {
            enabled: true,
            format: '{point.name}'
        }
    }]
});