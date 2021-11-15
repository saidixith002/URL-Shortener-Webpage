const form = document.querySelector(".main-class form");
const form1 = document.querySelector(".popup-box form");

form.onsubmit = (e) =>{
	e.preventDefault();
}
form1.onsubmit = (e) =>{
	e.preventDefault();
}
function saveBtnClicked(ful_url){
	
	let xhr = new XMLHttpRequest();
	let url = "PHPScripts/saveData.php?full_url=".concat(ful_url);
	
	xhr.open("POST",url,true);
	xhr.onload=()=>{
		if(xhr.readyState == 4 && xhr.status == 200){
			let data = xhr.response;
			if(data.length < 22){
				location.assign("");
			}else{
				alert(data);
			}
		}
	}
	let formData = new FormData(form1);
	xhr.send(formData);
}
function shortenBtnCLicked(){
	
	let xhr = new XMLHttpRequest();
	xhr.open("POST","PHPScripts/validateUrl.php",true);
	xhr.onload=()=>{
		if(xhr.readyState == 4 && xhr.status == 200){
			let data = xhr.response;
			
			if(data.length <= 5){
				
				let blurEffect = document.querySelector(".popup-background-blur");
				blurEffect.style.display = "block";
				let popupBox = document.querySelector(".popup-box");
				popupBox.classList.add("show");
				let shortenUrl = popupBox.querySelector("input");
				let domain = "localhost/url?u=";
				shortenUrl.value = domain + data;
				let saveBtn = popupBox.querySelector("button");
				saveBtn.onclick = ()=>{
					let str =  form.querySelector("input").value;
					saveBtnClicked(str);
				}
			}else{
				alert(data);
			}
		}
	}
	let formData = new FormData(form);
	xhr.send(formData);
}
