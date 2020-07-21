"use strict"
var Products = {

	$productCreateFirst: {},
	$productCreateSecond: {},
	$productCreateThird: {},
	$productCreateFourth: {},

	init: function(opts) {

		$("input[name='radios']").on('change', this.radioOptions.bind(this));

		$(".category-wrapper").find('select').on('change', this.getCategoriesByParent.bind(this));
	},

	radioOptions: function(e) {

		var $this = $(e.currentTarget);
		var content = "";

		if ($this.val() == 0) {
			
			$.ajax({
				type: 'GET',
				url: '/products-all',
				data: {}
			}).done(function(response){
				$.each(response.products, function(key, value){
					console.log(value.objectId);

					$('select#products-list').append('<option value="'+value.objectId+'">'+value.product_name+'</option>');
		
				});
				
				$('select#products-list').show();
			});
	
		} else { 

			$.ajax({
				type: 'GET',
				url: '/products-categories',
				data: {},
			}).done( function(response) {
				
				$.each(response.categories, function(key, value){
					console.log(value.objectId);

					if (typeof value.parent_category === 'undefined') {
						$('select#products-category').append('<option value="'+value.objectId+'">'+value.category_name+'</option>');
					}
					
				});
				
				$('select#products-category').show();
				$('select#products-category').attr('disabled');
			});

		}
	},

	getCategoriesByParent: function(e) {

		var $this = $(e.currentTarget);

		$.ajax({
			type: 'POST',
			url: '/categories-by-parent',
			data: {
				category_id:  $this.val()
			}
		}).done(function(response){

			var content = '';
			if (response.categories.length !== 0) {
				content += '<select>';
				$.each(response.categories, function(key, value){
					console.log(value.objectId);

					content += '<option value="'+value.objectId+'">'+value.category_name+'</option>';
				});
				content += '</select>';

			 	$this.after(content);
			}
		});
	},

	getProductsByCategory: function() {
		$.ajax({
			type: 'POST',
			url: '/category-products',
			data: {
				category_id: 'yZEvLWlnLf'
			}
		}).done(function(response){
			console.log(response);
		});
	}
};