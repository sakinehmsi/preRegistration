var coursesID = [];

function addLess(id){
	if(! ($("#"+id).hasClass('selected')) ){
		 $("#"+id).addClass('selected');
		 coursesID.push(id);
		 $("#coursesID").val(coursesID.toString());
    }
  	else  {
	   $("#"+id).removeClass('selected');
	   removeElement(coursesID, id);
	   $("#coursesID").val(coursesID.toString());
    }
}

function removeElement(array, elem) {
    var index = array.indexOf(elem);
    if (index > -1) {
        array.splice(index, 1);
    }
}
