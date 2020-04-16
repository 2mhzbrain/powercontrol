function edit_row(no)
{
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("edit_button"+no).style.display="none";
 document.getElementById("save_button"+no).style.display="block";
	
 var day=document.getElementById("day_row"+no);
 var room=document.getElementById("room_row"+no);
 var subject=document.getElementById("subject_row"+no);
 var stime=document.getElementById("stime_row"+no);
 var etime=document.getElementById("etime_row"+no);
	
 var day_data=day.innerHTML;
 var room_data=room.innerHTML;
 var subject_data=subject.innerHTML;
 var stime_data=stime.innerHTML;
 var etime_data=etime.innerHTML;
	
 day.innerHTML="<select id='day_text"+no+"' value='"+day_data+"'><option value='Monday'>Monday</option><option value='Tuesday'>Tuesday</option><option value='Wednesday'>Wednesday</option><option value='Thursday'>Thursday</option><option value='Friday'>Friday</option><option value='Saturday'>Saturday</option><option value='Sunday'>Sunday</option></select>";
 room.innerHTML="<input type='text' id='room_text"+no+"' value='"+room_data+"'>";
 subject.innerHTML="<input type='text' id='subject_text"+no+"' value='"+subject_data+"'>";
 stime.innerHTML="<input type='text' id='stime_text"+no+"' value='"+stime_data+"'>";
 etime.innerHTML="<input type='text' id='etime_text"+no+"' value='"+etime_data+"'>";
}

function save_row(no)
{
 var day_val=document.getElementById("day_text"+no).value;
 var room_val=document.getElementById("room_text"+no).value;
 var subject_val=document.getElementById("subject_text"+no).value;
 var stime_val=document.getElementById("stime_text"+no).value;
 var etime_val=document.getElementById("etime_text"+no).value;

 document.getElementById("day_row"+no).innerHTML=day_val;
 document.getElementById("room_row"+no).innerHTML=room_val;
 document.getElementById("subject_row"+no).innerHTML=subject_val;
 document.getElementById("stime_row"+no).innerHTML=stime_val;
 document.getElementById("etime_row"+no).innerHTML=etime_val;

 document.getElementById("edit_button"+no).style.display="block";
 document.getElementById("save_button"+no).style.display="none";
}

function delete_row(no)
{
 document.getElementById("row"+no+"").outerHTML="";
}

function add_row()
{
 var new_day=document.getElementById("new_day").value;
 var new_room=document.getElementById("new_room").value;
 var new_subject=document.getElementById("new_subject").value;
 var new_stime=document.getElementById("new_stime").value;
 var new_etime=document.getElementById("new_etime").value;
	
 var table=document.getElementById("data_table");
 var table_len=(table.rows.length)-1;
 var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='day_row"+table_len+"'>"+new_day+"</td><td id='room_row"+table_len+"'>"+new_room+"</td><td id='subject_row"+table_len+"'>"+new_subject+"</td><td id='stime_row"+table_len+"'>"+new_stime+"</td><td id='etime_row"+table_len+"'>"+new_etime+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")' style='display:none'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

 document.getElementById("new_day").value="";
 document.getElementById("new_room").value="";
 document.getElementById("new_subject").value="";
 document.getElementById("new_stime").value="";
 document.getElementById("new_etime").value="";
}