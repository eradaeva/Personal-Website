function clearBlogButton(event){

    let userConfirmed = confirm('Are you sure you wish to reset your blog entry?');

    if (userConfirmed) {
        document.getElementById('title').value = ''; 
        document.getElementById('description').value = ''; 

        removeValidationErrors();
    }
}


function removeValidationErrors(){
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    if (titleInput.classList.contains('is-invalid') || descriptionInput.classList.contains('is-invalid')) {
        titleInput.classList.remove('is-invalid');
        descriptionInput.classList.remove('is-invalid');
    }
}

function submitBlogButton(event){
    let isValid = true;
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');

    removeValidationErrors();

    if (titleInput.value.trim() === '') {
        titleInput.classList.add('is-invalid');
        isValid = false;
    }

    if (descriptionInput.value.trim() === '') {
        descriptionInput.classList.add('is-invalid');
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
        alert('Please fill out all required fields.');
    } else {
        document.getElementById("post-form").submit();
    }
}

const toggleMenu = () => {
    const menu = document.querySelector('.navbar ul');
    menu.classList.toggle('active');
}

document.addEventListener('DOMContentLoaded', function(){
    let resetButton = document.querySelector('#clear-blog');
    let submitButton = document.querySelector('#submit-blog');

    if(resetButton){
        resetButton.addEventListener('click', clearBlogButton);
    }
    if(submitButton){
        submitButton.addEventListener('click', submitBlogButton);
    }

    const hamburger = document.querySelector('.hamburger');
    if(hamburger){
        hamburger.addEventListener('click', toggleMenu);
    }

    let selectElement = document.getElementById('months');
    let form = document.getElementById('months-form');
    if(selectElement && form){
        selectElement.addEventListener('change', function(){
            form.submit();
        });
    }
    
    let registerBtn = document.getElementById('submit-register');
    if(registerBtn){
        registerBtn.addEventListener('click', register);
    }

    // const commentsBtn = document.querySelector(".expand-comments-section");
    // const commentsContent = document.querySelector(".comment-content");
    // if(commentsBtn&&commentsContent){
    //     console.log(commentsContent.style.display);
    //     commentsBtn.addEventListener('click', function (){
    //         commentsContent.style.display = commentsContent.style.display == 'block' ? 'none' : 'block';
    //         console.log("ya perdole");
    //     })
    // }

    
})

function errorMessage(){
    address = window.location.search;
    paramList = new URLSearchParams(address);
    
    if(paramList.get("wrongPassword")==="true"){
        alert("Wrong password! Please try again.");
    }
    if(paramList.get("wrongEmail")==="true"){
        alert("Wrong email! Please try again.");
    }
    if(paramList.get("errorLogin")==="true"){
        alert("You are not loggen in! Log in first to write a post!");
    }
    if(paramList.get("DuplicateEmail")==="true"){
        alert("This email is already registered in the system!");
    }
}


function register(){
    window.location.href = 'register.html';
}

document.querySelectorAll('.expand-comments-section').forEach(button =>{
    
    button.addEventListener('click', function(){
        console.log("hui");
        let commentsContent = this.parentNode.nextElementSibling;
        commentsContent.style.display = commentsContent.style.display == 'block' ? 'none' : 'block';
    })
})



document.querySelectorAll('.delete').forEach(button =>{
    button.addEventListener('click', function(){
        let postElement = this.closest('.blog-post');
        let postId = postElement.id;

        if(confirm("Ary you sure you want to delete this post?")){
            fetch('delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `postId=${postId}`
            }).then(response=> response.json())
              .then(data => {
                if(data.success){
                    postElement.remove();
                }else{
                    alert('Error: Could not delete the post. ' + data.error);
                }
            })
        }
        
    })
})



document.querySelectorAll('.delete-comment').forEach(function(item) {
    item.addEventListener('click', function() {
        let commentElement = this.previousSibling.previousSibling;
        let commentId = commentElement.id; // Ensure you set this data attribute in your HTML

        if (confirm('Are you sure you want to delete this comment?')) {
            fetch('deleteComment.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `commentId=${commentId}`
            })
            .then(response => response.json())
            .then(data => {
                if(data.success){
                    commentElement.parentNode.parentNode.remove();
                    console.log(data);
                    
                }else{
                    alert('Error: Could not delete the comment: ' + error);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
});




window.onload = errorMessage;




