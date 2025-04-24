const searchbar=document.querySelector(".search_bar");
    const searchBTN=document.querySelector(".search");
    let numberOfClicks=0;
    const bodydiv=document.querySelector(".body")
    const form=document.querySelector(".addform")
    const add=document.querySelector(".add")
  function generateInput(){
    
    if (numberOfClicks===0){
    const form=document.createElement("form")
    form.method="POST"
    form.setAttribute("class","searchForm")
    form.setAttribute("style","all:unset")
    const Titre=document.createElement("input");
    Titre.name="titre";
    Titre.type="text";
    const input=document.createElement("input");
    input.name="search";
    input.type="submit";
    input.value="Search";
    form.appendChild(Titre);
    form.appendChild(input);
  
    searchbar.appendChild(form);
    numberOfClicks=1;
    
    
    }
    else{
        const form=document.querySelector(".searchForm");
        form.remove();
        window.location.href = window.location.href;
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
