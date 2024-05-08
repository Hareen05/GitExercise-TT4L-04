let search = document.querySelector('.search-bar');

document.querySelector('#search-icon').onclick = () =>{
  search.classList.toggle('active');
}

let user = document.querySelector('.user');

document.querySelector('#user-icon').onclick = () =>{
  user.classList.toggle('active');
  search.classList.toggle('active');

}

document.getElementById('addProductButton').onclick = function() {
  var form = document.getElementById('productForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
};






