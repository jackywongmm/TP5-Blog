webpackJsonp([5],{r6ev:function(t,e){},rMeO:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var s=a("mvHQ"),n=a.n(s),i={data:function(){return{modalAdd:!1,addinfo:{key:"",value:""},tableData:[]}},methods:{openadd:function(){this.modalAdd=!0},getinformation:function(){var t=this;this.$axiosPost({url:"api/Admins/query_message",resolve:function(e){1==e.status&&(t.tableData=e.data)}})},saveAdd:function(){var t=this;this.$axiosPost({url:"api/Admins/add_message",params:this.addinfo,resolve:function(e){1==e.status?(t.modalAdd=!1,t.tableData.push(JSON.parse(n()(t.addinfo))),t.$message({message:e.point,type:"success"})):t.$message({message:e.point,type:"warning"})}})},handleClick:function(t){var e=this;this.$axiosPost({url:"api/Admins/delete_message",params:{id:t.id},resolve:function(t){1==t.status?(e.$message({message:t.point,type:"success"}),e.getinformation()):e.$message({message:t.point,type:"warning"})}})}},created:function(){this.getinformation()}},o={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("el-button",{attrs:{type:"primary"},on:{click:t.openadd}},[t._v("增加个人信息")]),t._v(" "),a("el-table",{attrs:{data:t.tableData}},[a("el-table-column",{attrs:{prop:"key",label:"信息名称"}}),t._v(" "),a("el-table-column",{attrs:{prop:"value",label:"描述"}}),t._v(" "),a("el-table-column",{attrs:{label:"操作"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{type:"text",size:"small"},on:{click:function(a){t.handleClick(e.row)}}},[t._v("删除")])]}}])})],1),t._v(" "),a("el-dialog",{attrs:{visible:t.modalAdd,width:"20%"},on:{"update:visible":function(e){t.modalAdd=e}}},[a("el-form",{attrs:{inline:""}},[a("el-form-item",{attrs:{label:"属性","label-width":"60px"}},[a("el-input",{attrs:{type:"text"},model:{value:t.addinfo.key,callback:function(e){t.$set(t.addinfo,"key",e)},expression:"addinfo.key"}})],1),t._v(" "),a("el-form-item",{attrs:{label:"信息","label-width":"60px"}},[a("el-input",{attrs:{type:"text"},model:{value:t.addinfo.value,callback:function(e){t.$set(t.addinfo,"value",e)},expression:"addinfo.value"}})],1)],1),t._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{attrs:{type:"primary"},on:{click:t.saveAdd}},[t._v("添加")])],1)],1)],1)},staticRenderFns:[]};var l=a("VU/8")(i,o,!1,function(t){a("r6ev")},"data-v-a6f05852",null);e.default=l.exports}});
//# sourceMappingURL=5.56ae9bce604febdae567.js.map