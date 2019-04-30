function showSelection(selectedValue) {
  //Hide All Sections
  let sections = ["Student", "Librarian", "Book"];
  for(let lcv=0; lcv<3;lcv++) {
    let addArr = document.getElementsByClassName("add"+sections[lcv]);
    for(let a = 0; a<addArr.length;a++) {
      addArr[a].style.display = "none";
    }

    let deleteArr = document.getElementsByClassName("delete"+sections[lcv]);
    for(let d = 0; d<deleteArr.length;d++) {
      deleteArr[d].style.display = "none";
    }
    let viewArr = document.getElementsByClassName("view"+sections[lcv]);
    for(let v = 0; v<viewArr.length;v++) {
      viewArr[v].style.display = "none";
    }
  }
    let currentArr = document.getElementsByClassName(selectedValue);

    for(let c = 0; c<currentArr.length;c++) {
      currentArr[c].style.display = "block";
    }
}

function showAQSelection(selectedValue) {
  document.getElementById('testQ').style.display = 'block';
}
