let search = document.querySelector('.search-bar');

document.querySelector('#search-icon').onclick = () =>{
  search.classList.toggle('active');
}

let user = document.querySelector('.user');

document.querySelector('#user-icon').onclick = () =>{
  user.classList.toggle('active');
  search.classList.toggle('active');
}