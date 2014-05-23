<!-- PILIH PELANGGAN --> 
<div id='dlgSelectCust'class="easyui-dialog" style="width:600px;height:380px;padding:5px 5px"
     closed="true" buttons="#btn1">
     <div id='divSelectCust'> 
		<table id="dgSelectCust" class="easyui-datagrid"  
			data-options="
				toolbar: '',
				singleSelect: true,
				url: ''
			">
			<thead>
				<tr>
					<th data-options="field:'company',width:'180'">Pelanggan</th>
					<th data-options="field:'customer_number',width:'80'">Kode</th>
					<th data-options="field:'salesman',width:'80'">Salesman</th>
					<th data-options="field:'city',width:'80'">Kota</th>
					<th data-options="field:'region',width:'80'">Wilayah</th>
				</tr>
			</thead>
		</table>
    </div>   
</div>
<div id="btn1" name="btn1" style="height:auto">
		<input  id="search_cust" style='width:100' name="search_cust" placeholder='Search'>
		<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="false" onclick="select_customer();return false;">Cari</a>        
	<a href="#" class="easyui-linkbutton" iconCls="icon-ok" plain="false" onclick="selected_customer();return false;">Pilih</a>
</div>
<SCRIPT language="javascript">
	function select_customer(){
			search=$('#search_cust').val();
			$('#dlgSelectCust').dialog('open').dialog('setTitle','Cari Pelanggan');
			$('#dgSelectCust').datagrid({url:'<?=base_url()?>index.php/customer/select/'+search});
			$('#dgSelectCust').datagrid('reload');
	};	
	function selected_customer(){
		var row = $('#dgSelectCust').datagrid('getSelected');
		if (row){
			$('#sold_to_customer').val(row.customer_number);
			$('#company').val(row.company);
			$('#customer_info').html(row.company+'<br>'+row.street+'<br>'+row.city);
			$('#customer_number').val(row.customer_number);
			$('#dlgSelectCust').dialog('close');
		} else {
			alert("Pilih salah satu nomor customer !");
		}
	}	
</SCRIPT>
<!-- END PILIH PELANGGAN -->

