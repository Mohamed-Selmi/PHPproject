const searchbar=document.querySelector(".search_bar");
    const searchBTN=document.querySelector(".search");
    let numberOfClicks=0;
    const bodydiv=document.querySelector(".body")
    const form=document.querySelector(".addform")
    const add=document.querySelector(".add")
  function generateInput(){
    
    if (numberOfClicks===0){
    const input=document.createElement("input");
    input.name="search";
    input.type="text";
    input.value="aaaaa";
    searchbar.appendChild(input);
    numberOfClicks=1;
    console.log("aa")
    
    }
    else{
        const input=document.querySelector("input");
       input.remove();
       console.log("aa")
       numberOfClicks=0;
    }
  }
  function showAddForm(){
    if (form.style.visibility==='visible'){
        form.style.visibility = "hidden"; 
    }
    else form.style.visibility='visible'
  }
  add.addEventListener("click",()=>showAddForm());
searchBTN.addEventListener("click",()=>generateInput());
