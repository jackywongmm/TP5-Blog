webpackJsonp([7],{QcwI:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var l={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("el-table",{attrs:{data:t.tableData}},[a("el-table-column",{attrs:{prop:"name",label:"昵称"}}),t._v(" "),a("el-table-column",{attrs:{prop:"email",label:"联系邮箱"}}),t._v(" "),a("el-table-column",{attrs:{prop:"title",label:"源文章"}}),t._v(" "),a("el-table-column",{attrs:{prop:"createTime",label:"时间"}}),t._v(" "),a("el-table-column",{attrs:{prop:"comment",label:"评论内容"}}),t._v(" "),a("el-table-column",{attrs:{label:"操作"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{type:"text",size:"small"},on:{click:function(a){t.handleClick(e.row)}}},[t._v("删除")])]}}])})],1)],1)},staticRenderFns:[]};var n=a("VU/8")({data:function(){return{tableData:[]}},methods:{getData:function(){var t=this;this.$axiosPost({url:"api/Admins/query_comment",resolve:function(e){t.tableData=e.data}})},handleClick:function(t){var e=this;this.$axiosPost({url:"api/Admins/delete_comment",params:{id:t.id},resolve:function(t){1==t.status?(e.$message({message:t.point,type:"success"}),e.getData()):e.$message({message:t.point,type:"warning"})}})}},created:function(){this.getData()}},l,!1,function(t){a("qMqY")},"data-v-46d2ec67",null);e.default=n.exports},qMqY:function(t,e){}});
//# sourceMappingURL=7.1d0b6d6098e4df6b1446.js.map