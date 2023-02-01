/*VectorMap Init*/

$(function() {
	"use strict";
	var mapData = {
			"US": 298,
			"SA": 200,
			"AU": 760,
			"IN": 2000000,
			"GB": 120,
		};
	
	if( $('#world_map_marker_1').length > 0 ){
		$('#world_map_marker_1').vectorMap(
		{
			map: 'world_mill_en',
			backgroundColor: 'transparent',
			borderColor: '#fff',
			borderOpacity: 0.25,
			borderWidth: 0,
			color: '#e6e6e6',
			regionStyle : {
				initial : {
				  fill : 'rgba(204, 204, 204,.6)'
				}
			  },

			markerStyle: {
			  initial: {
							r: 10,
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
				latLng : [-33.00, 151.00],
				name : 'Australia : 250'
				
			  },
			  {
				latLng : [36.77, -119.41],
				name : 'USA : 250'
			  
			  },
			  {
				latLng : [55.37, -3.41],
				name : 'UK   : 250'
			  
			  },
			  {
				latLng : [25.20, 55.27],
				name : 'UAE : 250'
			  
			  }],

			series: {
				regions: [{
					values: {
						"US": '#ffdfbe',
						"SA": '#ffdfbe',
						"AU": '#ffdfbe',
						"IN": '#ffdfbe',
						"GB": '#ffdfbe',
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

	if( $('#india').length > 0 ){
	$('#india').vectorMap({
			map : 'in_mill',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : 'rgba(204, 204, 204,.6)'
				}
			}
		});
	}	

	if( $('#usa').length > 0 ){
		$('#usa').vectorMap({
			map : 'us_aea_en',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : 'rgba(204, 204, 204,.5)'
				}
			},
			hoverOpacity: 0.7,
			markerStyle: {
				initial: {
					r: 8,
					'fill': '#0092ee',
					'fill-opacity':1,
					'stroke': '#000',
					'stroke-width' : 0,
					'stroke-opacity': 0.4
				}
			},
			markers: [{
				latLng: [41.50, -87.37],
				name: 'Chicago'
			}, {
				latLng: [32.46, -96.46],
				name: 'Dallas'
			}, {
				latLng: [36.10, -115.12],
				name: 'Las Vegas'
			}, {
				latLng: [34.3, -118.15],
				name: 'Los Angeles'
			}, {
				latLng: [40.43, -74.00],
				name: 'New York City'
			}]
		});
	}        
		   
	if( $('#australia').length > 0 ){        
		$('#australia').vectorMap({
			map : 'au_mill',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : 'rgba(204, 204, 204,.6)'
				}
			}
		});
	}	
	 
	if( $('#uk').length > 0 ){ 
		$('#uk').vectorMap({
			map : 'uk_mill_en',
			backgroundColor : 'transparent',
			regionStyle : {
				initial : {
					fill : 'rgba(204, 204, 204,.6)'
				}
			}
		});
	}	
});
 