(window.webpackJsonp=window.webpackJsonp||[]).push([[28],{"5Yus":function(t,e,s){"use strict";s("5twO")},"5twO":function(t,e,s){var a=s("II9F");"string"==typeof a&&(a=[[t.i,a,""]]);var o={hmr:!0,transform:void 0,insertInto:void 0};s("aET+")(a,o);a.locals&&(t.exports=a.locals)},II9F:function(t,e,s){(t.exports=s("I1BE")(!1)).push([t.i,".employees-count[data-v-42c0f56e]{font-size:4em}",""])},dlMF:function(t,e,s){"use strict";var a=s("H8ri");e.a={props:{labels:{type:Array,default:function(){return[]}},datasets:{},options:{type:Object}},extends:a.a,mounted:function(){this.renderChart({labels:this.labels,datasets:this.datasets},this.defaultOptions())},methods:{defaultOptions:function(){return Object.assign({responsive:!0,maintainAspectRatio:!1},this.options)}}}},e9hp:function(t,e,s){"use strict";s.r(e);var a={name:"SitesOverview",data:function(){return{labels:[],options:{label:{display:!0},legend:{display:!1},responsive:!0,title:{display:!0,text:this.title},scales:{yAxes:[{id:"sph"},{id:"goal"},{type:"linear",position:"right",id:"%_to_goal",gridLines:{drawOnChartArea:!1}}]},tooltips:{mode:"index",intersect:!1}},datasets:[]}},props:{info:{default:[]},height:{default:200},title:{default:""}},components:{BarChart:s("dlMF").a},computed:{computedLabels:function(){return this.labels=[],this.labels=Object.keys(this.info)},computedDatasets:function(){this.datasets=[];var t=Object.values(this.info),e=[{type:"line",label:"% To Goal",backgroundColor:"rgba(0,77,64 ,0.5)",borderColor:"rgba(0,77,64 ,1)",data:[],yAxisID:"%_to_goal",fill:!1},{label:"SPH",backgroundColor:"rgba(255,87,34 , .75)",borderColor:"rgba(255,87,34 , .35)",data:[],yAxisID:"sph"},{label:"GOAL",backgroundColor:"rgba(25,118,210 , .75)",borderColor:"rgba(25,118,210 , .35)",data:[],yAxisID:"goal"}];return t.forEach((function(t){e[0].data.push(t["%_to_goal"].toFixed(2)),e[1].data.push(t.sph.toFixed(3)),e[2].data.push(t.sph_goal.toFixed(3))})),this.datasets=e}}},o=(s("5Yus"),s("KHd+")),i=Object(o.a)(a,(function(){var t=this.$createElement;return(this._self._c||t)("bar-chart",{attrs:{labels:this.computedLabels,datasets:this.computedDatasets,options:this.options,height:this.height}})}),[],!1,null,"42c0f56e",null);e.default=i.exports}}]);