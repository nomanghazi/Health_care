$(function(){
    "use strict";    

    // notification popup
    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-top-right';
    toastr.options.showDuration = 10;
    toastr['info']('to Mooli.');    
        
    // Death & Recovery rate
    var chart = c3.generate({
        bindto: '#chart-bar-stacked', // id of chart wrapper
        data: {
            columns: [
                // each columns data
                ['data1', 110, 81, 158, 108, 149, 217],
                ['data2', 70, 192, 75, 97, 219, 152]
            ],
            type: 'bar', // default type of chart
            groups: [
                [ 'data1', 'data2']
            ],
            colors: {
                'data1': '#9367B4',
                'data2': '#0392cf',
            },
            names: {
                // name of each serie
                'data1': 'Recovery',
                'data2': 'Death'
            }
        },
        axis: {
            x: {
                type: 'category',
                // name of each category
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
            },
        },
        bar: {
            width: 10
        },
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 0,
            top: 0,
            left: 6,
        },
    });

    //multiple comparison series
    var chart = c3.generate({
        bindto: '#chart-donut-d', // id of chart wrapper
        data: {
            type: 'donut', // default type of chart

            columns: [
                // each columns data
                ['data1', 20],
                ['data2', 30],
                ['data3', 50]
            ],            
            colors: {
                'data1': '#82b440',
                'data2': '#0392cf',
                'data3': '#9367b4',
            },
            names: {
                // name of each serie
                'data1': 'Cancelled',
                'data2': 'Completed',
                'data3': 'Pending',
            }
        },
        axis: {
        },
        legend: {
            show: false, //hide legend
        },
        padding: {
            bottom: 0,
            top: 0
        },
    });
        
    // world map
    if( $('#world-map-markers').length > 0 ){

        $('#world-map-markers').vectorMap( {
            map: 'world_mill_en',
            backgroundColor: 'transparent',
            borderColor: '#fff',
            borderOpacity: 0.25,
            borderWidth: 0,
            color: '#e6e6e6',
            regionStyle : {
                initial : {
                fill : '#e2e4e7'
                }
            },
            markerStyle: {
                initial: {
                    r: 5,
                    'fill': '#fff',
                    'fill-opacity':1,
                    'stroke': '#000',
                    'stroke-width' : 1,
                    'stroke-opacity': 0.4
                },
            },
        
            markers : [{
                latLng : [21.00, 78.00],
                name : 'INDIA : 350'            
            },
                {
                latLng : [36.77, -119.41],
                name : 'USA : 250'                
            },              
                {
                latLng : [-35.473469, 149.012375],
                name : 'AU : 39'            
            }],

            series: {
                regions: [{
                    values: {
                        "US": '#82b440',
                        "IN": '#61bda1',
                        "AU": '#0392cf',                        
                    },
                    attribute: 'fill'
                }]
            },

            hoverOpacity: null,
            normalizeFunction: 'linear',
            zoomOnScroll: false,
            scaleColors: ['#000000', '#000000'],
            selectedColor: '#000000',
            selectedRegions: [],
            enableZoom: false,
            hoverColor: '#fff',
        });
    }
});