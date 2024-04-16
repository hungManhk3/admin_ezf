

function showPost(page){  
    $.ajax({
        url:"./adminView/viewPost.php",
        method:"post",
        data:{page:page},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showRestaurant(page){  
    //console.log(page);
    $.ajax({
        url:"./adminView/viewRestaurant.php",
        method:"post",
        data:{page:page},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showDish(page){  
    $.ajax({
        url:"./adminView/viewDish.php",
        method:"post",
        data:{page:page},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showUsers(){
    $.ajax({
        url:"./adminView/viewUsers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


//add restaurant data
function addRestaurant(event) {
    event.preventDefault();
    var r_name =$('#rname').val();
    var r_address =$('#raddress').val();
    var r_phone=$('#rphone').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];
    console.log(r_name,r_address,r_phone,file,upload);
    var fd = new FormData();
    fd.append('rname',r_name);
    fd.append('raddress',r_address);
    fd.append('rphone',r_phone);
    fd.append('upload', upload);
    fd.append('file',file)
    $.ajax({
        url:"./controller/addResController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            $('form').trigger('reset');
            alert(data);
            $('.modal-backdrop').remove();
            showRestaurant(1);
        }
    });
}

//add restaurant data
function addDish(event) {
    event.preventDefault();
    var dname =$('#dname').val();
    var ddes = document.getElementById('ddes').value;
    var cat = $('#category').val();
    var res = $('#restaurant').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];
    console.log(dname,ddes,res,cat,file,upload);
    var fd = new FormData();
    fd.append('dname',dname);
    fd.append('ddes',ddes);
    fd.append('cat',cat);
    fd.append('res',res);
    fd.append('upload', upload);
    fd.append('file',file)
    $.ajax({
        url:"./controller/addDishController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            $('form').trigger('reset');
            alert(data);
            $('.modal-backdrop').remove();
            showDish(1);
        }
    });
}

function addPost(event) {
    event.preventDefault();
    var title = document.getElementById('title').value;
    var content = document.getElementById('content').value;
    var dish = $('#dish').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];
    console.log(title,content,dish,file,upload);
    var fd = new FormData();
    fd.append('title',title);
    fd.append('content',content);
    fd.append('dish',dish);
    fd.append('upload', upload);
    fd.append('file',file)
    $.ajax({
        url:"./controller/addPostController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            $('form').trigger('reset');
            alert(data);
            $('.modal-backdrop').remove();
            showPost(1);
        }
    });
}

// update restaurant data
function resEditForm(id){
    $.ajax({
        url:"./adminView/resEditForm.php",
        method:"post",
        data:{id:id},
        success:function(data){
           $('.allContent-section').html(data);
        }
    });
}

function dishEditForm(id){
    $.ajax({
        url:"./adminView/dishEditForm.php",
        method:"post",
        data:{id:id},
        success:function(data){
           $('.allContent-section').html(data);
        }
    });
}

function postEditForm(id){
    $.ajax({
        url:"./adminView/postEditForm.php",
        method:"post",
        data:{id:id},
        success:function(data){
           $('.allContent-section').html(data);
        }
    });
}

function updateRes(event){
    event.preventDefault();
    var r_id = $('#r_id').val();
    var r_name = document.getElementById('r_name').value;
    var r_address = $('#r_address').val();
    var r_phone = $('#r_phone' ).val();
    var upload=$('#upload').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    console.log(r_id,r_name,r_address,r_phone,existingImage,newImage);
    var fd = new FormData;
    fd.append( 'r_id', r_id );
    fd.append('r_name', r_name);
    fd.append( 'r_address', r_address);
    fd.append('r_phone',r_phone );
    fd.append('upload',upload );
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
    $.ajax({
        url:'./controller/updateResController.php',
        method:'post',
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
          alert(data);
          $('form').trigger('reset');
          showRestaurant(1);
        }
      });
}
function updateDish(event){
    event.preventDefault();
    var did = $('#did').val();
    var dname = $('#dname').val();
    var ddesc = document.getElementById('ddes').value;
    var cat = $('#category').val();
    var res = $('#restaurant' ).val();
    var upload=$('#upload').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    console.log(did,dname,ddesc,cat,res,existingImage,newImage);
    var fd = new FormData;
    fd.append( 'did', did );
    fd.append('dname', dname);
    fd.append( 'ddesc', ddesc);
    fd.append('cat',cat );
    fd.append('res',res );
    fd.append('upload',upload );
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
    $.ajax({
        url:'./controller/updateDishController.php',
        method:'post',
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
          alert(data);
          $('form').trigger('reset');
          showDish(1);
        }
      });
}

function updatePost(event){
    event.preventDefault();
    var pid = $('#pid').val();
    var title = document.getElementById('title').value;
    var content = document.getElementById('content').value;
    var dish = $('#dish').val();
    var upload=$('#upload').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    console.log(pid,title,content,dish,existingImage,newImage);
    var fd = new FormData;
    fd.append( 'pid', pid );
    fd.append('title', title);
    fd.append( 'content', content);
    fd.append('dish',dish );
    fd.append('upload',upload );
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
    $.ajax({
        url:'./controller/updatePostController.php',
        method:'post',
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
          alert(data);
          $('form').trigger('reset');
          showPost(1);
        }
      });
}


//delete restaurant data
function resDelete(id){
    $.ajax({
        url:"./controller/resDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Restaurant Successfully deleted');
            $('form').trigger('reset');
            showRestaurant(1);
        }
    });
}function dishDelete(id){
    $.ajax({
        url:"./controller/dishDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Restaurant Successfully deleted');
            $('form').trigger('reset');
            showDish(1);
        }
    });
}function dishDelete(id){
    $.ajax({
        url:"./controller/postDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Restaurant Successfully deleted');
            $('form').trigger('reset');
            showPost(1);
        }
    });
}