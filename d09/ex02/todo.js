let ft_list = document.getElementById('ft_list');
let cookie = [];

window.onload = function () {
    document.querySelector("#new").addEventListener("click", newTodo);
    ft_list = document.querySelector("#ft_list");
    ft_list.innerHTML = "";
    let d_c = getCookie('todo');
    if (d_c) {
        cookie = JSON.parse(d_c);
        cookie.forEach(function (e) {
            addTodo(e);
        });
    }
};

function newTodo(){
    let todo = prompt("New TODO", '');
    if (todo !== '') {
        addTodo(todo)
    }
    cookie.unshift(todo);
    setCookie('todo', JSON.stringify(cookie), 7);
}

function addTodo(todo){
    let div = document.createElement("div");
    div.innerHTML = todo;
    div.addEventListener("click", deleteTodo);
    ft_list.insertBefore(div, ft_list.firstChild);
}

function deleteTodo(){
    if (confirm("Done")){
        this.parentElement.removeChild(this);
    }
    cookie.splice(cookie.indexOf(this), 1);
    setCookie('todo', JSON.stringify(cookie), 7);
}

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');

    for (let i = 0; i < ca.length; i++) {
        let  c = ca[i];
        while (c.charAt(0) === ' ')
			c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
        	return c.substring(nameEQ.length, c.length);
    }
    return null;
}