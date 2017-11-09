<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
    <!-- Modal 模态对话框 -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">管理员信息</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        
        <div class="row">
            <div class="col-lg-12" style="width: 100%">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <li class="fa fa-pencil-square-o" style="margin-right: 0.5em;"></li>
                        <label>管理员</label>
                    </div>    
                    <div class="dataTable_wrapper" style="margin:10px">
                        <div class="dataTable_wrapper" style="margin:10px">
                            <table class="table table-striped table-bordered table-hover" id="userInfo" >
                                <thead>
                                    <tr>
                                        <!-- <th>uid</th> -->
                                        <th>管理员号</th>
                                        <th>管理员</th>
                                        <th>手机号</th>
                                        <th>管理员等级</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        
    </div>
    <!-- /#page-wrapper -->


    <!-- /#wrapper -->
<script>
    var infoTable;
    $(document).ready(function() {
        infoTable = $('#userInfo').DataTable({
            dom: '<"toolbar">frtip',
            responsive: true,
            autoWidth: false,
            ajax: "../UserInfo/getUserInfo",
            dataSrc: "data",
            order: [0,'desc'],
            columnDefs: [
                // {
                //     "targets": [1],
                //     "data": "cnt",
                //     "render": function(data, type, full){
                //         return parseInt(data).toLocaleString();
                //     }
                // },
            ],
            columns: [
                {"data": "userid"},
                {"data": "username"},
                {"data": "tel"},
                {"data": "roleid"},
            ],
            lengthChange: false,
            pageLength: 31,
        });
    });
</script>