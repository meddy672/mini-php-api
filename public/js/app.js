/*
* This javascript file is for the test.html file.
* It is used get and post data to the server 
* 
*
*
*/

$(document).ready(function(){


	$.get('http://localhost/slimblog/public/api/posts', function(data){

		if(data.length > 0){

			$.each(JSON.parse(data), function(index, post){

				$('#postGet').append('<li><a href="http://localhost/slimblog/public/api/post/'
					+post.id+'" class="">'+post.title+'</a></li>');

				$('.post_id').append('<option value="'+post.id+'">'+post.title+'</option>');

			});
		}
	});


	$.get('http://localhost/slimblog/public/api/categories', function(data){

		if(data.length > 0){

			$.each(JSON.parse(data), function(index, categories){

				$('#categoriesGet').append('<li><a href="http://localhost/slimblog/public/api/category/'
					+categoriesGet.id+'" class="">'+categories.name+'</a></li>');

				$('.cat_id').append('<option value="'+categories.id+'">'+categories.name+'</option>');

			});
		}
	});


	// Create New Post
	$('#createPostBtn').click(function(){

		var title = $('#createTitle').val();
		var category_id = $('#createCategoryId').val();
		var body = $('#createBody').val();

		$.post('http://localhost/slimblog/public/api/post/add', {
			title: title,
			category_id: category_id,
			body: body

		}).done(function(data){
			alert( "Data Loaded: " + data );
		})
	});


	// Update Post
	$('#updatePostBtn').click(function(){

		var post_id = $('#updatePostId').val();
		var title = $('#updateTitle').val();
		var category_id = $('#updateCategoryId').val();
		var body = $('#updateBody').val();

		$.ajax({
			url:'http://localhost/slimblog/public/api/post/update/'+post_id,
			method:'PUT',
			data:{

				title: title,
				category_id: category_id,
				body: body
			},
			success:function(data){
				alert( "Data Loaded: " + data );
			}
		})

	});


	// Delete Post
	$('#deletePostBtn').click(function(){

		var post_id = $('#deletePostId').val();

		$.ajax({
			url:'http://localhost/slimblog/public/api/post/delete/'+post_id,
			method:'DELETE',
			success:function(data){
				alert( "Data Loaded: " + data );
			}
		})

	});




});