$( document ).ready(function() {
  //  console.log( "ready!" );
    $.ajax({
    	type:'GET',
    	url:'./data/products.json',
    	dataType:'json',
    	success:function(data){
    		$.each(data, function(key,value){
                   $('.list-group').append(`<a href="#" class="list-group-item list-group-item-action" data-id="${value.SKU}"> ${value.Name} </a>`);
    	console.log(value.SKU );
    		});
    	}
    })
});