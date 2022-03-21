function checkPalindrome(word) {
  let j = word.length - 1;

  for( let i = 0 ; i < j / 2 ;i++) {
    let forwardCharacter = word[i] ;
    let backwardCharacter = word[j-i];
  
    if(forwardCharacter != backwardCharacter) {
      return false;
    }
  }

  return true;
}
