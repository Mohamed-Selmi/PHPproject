/*const login=document.querySelector(".login")
login.addEventListener("click",()=>{
    alert("clicked");
})


const header=document.querySelector(".header")
const btn=document.querySelector(".menu")

function createMenu(){
    const div=document.createElement("div")
    const ul=document.createElement("ul")
    const li=document.createElement("li")
    li.textContent="Hello";
    ul.appendChild(li);
    div.appendChild(ul);
    header.appendChild(div)
    console.log("clicked")
}


btn.addEventListener("click",createMenu)*/

window.addEventListener("beforeunload",(event)=>{
    event.preventDefault;
    console.log("I am the 2nd one.");
});
window.addEventListener("unload",(event)=>{
    event.preventDefault;
    console.log("I am the and one.");
});

  const form=document.querySelector("form")
  const login=document.querySelector(".login")
  login.addEventListener("click",()=>{
        console.log(form.input.textContent)
      alert("clicked");
  })
  