$(function(){"use strict";var a=$("#salesChart").get(0).getContext("2d"),a=(new Chart(a,{type:"line",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"Digital Goods",backgroundColor:"rgba(60,141,188,0.9)",borderColor:"rgba(60,141,188,0.8)",pointRadius:!1,pointColor:"#3b8bba",pointStrokeColor:"rgba(60,141,188,1)",pointHighlightFill:"#fff",pointHighlightStroke:"rgba(60,141,188,1)",data:[28,48,40,19,86,27,90]},{label:"Electronics",backgroundColor:"rgba(210, 214, 222, 1)",borderColor:"rgba(210, 214, 222, 1)",pointRadius:!1,pointColor:"rgba(210, 214, 222, 1)",pointStrokeColor:"#c1c7d1",pointHighlightFill:"#fff",pointHighlightStroke:"rgba(220,220,220,1)",data:[65,59,80,81,56,55,40]}]},options:{maintainAspectRatio:!1,responsive:!0,legend:{display:!1},scales:{xAxes:[{gridLines:{display:!1}}],yAxes:[{gridLines:{display:!1}}]}}}),$("#pieChart").get(0).getContext("2d"));new Chart(a,{type:"doughnut",data:{labels:["Chrome","IE","FireFox","Safari","Opera","Navigator"],datasets:[{data:[700,500,400,600,300,100],backgroundColor:["#f56954","#00a65a","#f39c12","#00c0ef","#3c8dbc","#d2d6de"]}]},options:{legend:{display:!1}}});$("#world-map-markers").mapael({map:{name:"usa_states",zoom:{enabled:!0,maxLevel:10}}})});