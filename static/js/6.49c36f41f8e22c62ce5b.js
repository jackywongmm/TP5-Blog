webpackJsonp([6],{A5za:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var l={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",[a("el-table",{attrs:{data:e.tableData}},[a("el-table-column",{attrs:{prop:"name",label:"昵称"}}),e._v(" "),a("el-table-column",{attrs:{prop:"email",label:"联系邮箱"}}),e._v(" "),a("el-table-column",{attrs:{prop:"createTime",label:"时间"}}),e._v(" "),a("el-table-column",{attrs:{prop:"comment",label:"内容"}}),e._v(" "),a("el-table-column",{attrs:{label:"操作"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-button",{attrs:{type:"text",size:"small"},on:{click:function(a){e.handleClick(t.row)}}},[e._v("删除")])]}}])})],1)],1)},staticRenderFns:[]};var n=a("VU/8")({data:function(){return{tableData:[]}},methods:{getData:function(){var e=this;this.$axiosPost({url:"api/Admins/query_leaving_message",resolve:function(t){e.tableData=t.data}})},handleClick:function(e){var t=this;this.$axiosPost({url:"api/Admins/delete_leaving_message",params:{id:e.id},resolve:function(e){1==e.status?(t.$message({message:e.point,type:"success"}),t.getData()):t.$message({message:e.point,type:"warning"})}})}},created:function(){this.getData()}},l,!1,function(e){a("LwY3")},"data-v-5952d1fb",null);t.default=n.exports},LwY3:function(e,t){}});
//# sourceMappingURL=6.49c36f41f8e22c62ce5b.js.map