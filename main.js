function showSelection(sectionOperation) {
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
  }
  if(sectionOperation.startsWith('view')) {
    console.log("View Function");
    document.getElementById(sectionOperation).submit();
  }
  else {
    let currentArr = document.getElementsByClassName(sectionOperation);
    for(let c = 0; c<currentArr.length;c++) {
      currentArr[c].style.display = "block";
    }
  }
}
