let indexNew = 0;
function changeNew(element) {
  let arr = document.getElementsByClassName('pageNew');
  let len = arr.length;
  if (element == 'r') {
    if (indexNew >= len - 4) {
      indexNew = len - 5;
    } else {
      arr[indexNew].style.display = 'none';
      indexNew++;
    }
  }
  if (element == 'l') {
    if (indexNew < 0 ) {
      indexNew = 0;
    } else {
      arr[indexNew].style.display = 'flex';
      if(indexNew!=0)indexNew--;
    }
  }
}
let indexHot = 0;
function changeHot(element) {
  let arr = document.getElementsByClassName('pageHot');
  let len = arr.length;
  if (element == 'r') {
    if (indexHot >= len - 4) {
      indexHot = len - 5;
    } else {
      arr[indexHot].style.display = 'none';
      indexHot++;
    }
  }
  if (element == 'l') {
    if (indexHot < 0 ) {
      indexHot = 0;
    } else {
      arr[indexHot].style.display = 'flex';
      if(indexHot != 0)indexHot--;
    }
  }
}