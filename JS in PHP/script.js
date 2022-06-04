/********* Vanilla JS ************/

function sayHello() {
  alert("Hello");
}

document.getElementById("click").addEventListener("click", sayHello);


/********* Using JQuery *********/
$('#click').on('click', sayHello());
