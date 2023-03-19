// let createPostForm = document.querySelector("#create-post-form");
// let createPostMedia = document.querySelector("#create-post-media");
// let createPostText = document.querySelector("#create-post-txt");
// let createPostSubmitBtn = document.querySelector("#create-post-submit-btn");
// let mediaLabel = document.querySelector('[for="create-post-media"]');
// let postsContainer = document.querySelector("#posts-container");
// let mediaContainer = document.querySelector("#create-post-media-wrap");

// mediaLabel.addEventListener("keypress", (e) => {
//   if (e.key === "Enter") {
//     e.target.click();
//   }
// });

// createPostForm.addEventListener("submit", handleSubmit, false);
// createPostMedia.addEventListener("input", handleAddImg, false);

// createPostText.addEventListener("input", watchInputs, false);
// createPostMedia.addEventListener("change", watchInputs, false);

// function watchInputs() {
//   if (createPostText.value === "" && createPostMedia.value === "") {
//     createPostSubmitBtn.setAttribute("disabled", "true");
//     createPostForm.removeEventListener("submit", handleSubmit, false);
//   } else {
//     createPostSubmitBtn.removeAttribute("disabled");
//     createPostForm.addEventListener("submit", handleSubmit, false);
//   }
// }

// function generateImgPreview(file) {
//   let reader = new FileReader();

//   reader.readAsDataURL(file);
//   reader.onloadend = () => {
//     let preview = `
//       <figure class="create-post__media-item">
//         <button type="button" aria-label="delete image">

//         </button>
//         <img src="${reader.result}" alt="" />
//       </figure>
//     `;

//     mediaContainer.innerHTML = preview;

//     let closeBtn = mediaContainer.querySelector("button");
//     closeBtn.addEventListener("click", removeCreatePostImg, false);
//   };
// }

// function handleAddImg(e) {
//   const file = e.target.files[0];

//   if (!isValidImage(file)) {
//     createPostMedia.value = "";
//     return;
//   }

//   generateImgPreview(file);
// }

// watchInputs();

// /* Generate post functions */
// async function handleSubmit(e) {
//   e.preventDefault();

//   let postContent = {
//     text: createPostText.value,
//     img: createPostMedia.files[0]
//   };

//   let post = await createPost(postContent);
//   postsContainer.insertAdjacentHTML("afterbegin", post);
//   cleanCreatePost();
// }

// async function createPost(postContent) {
//   let header = generateHeader();
//   let body = await generateBody(postContent);
//   let footer = generateFooter();

//   let post = `
//     <article class="post">


//       <div class="post__content">
//         ${header}
//         ${body}
//         ${footer}
//       </div>
//     </article>
//   `;

//   return post;
// }

// function generateHeader() {
//   let header ='';
//   return header;
// }

// async function generateBody(postContent) {
//   let bodyContent = await generateBodyContent(postContent);

//   let body = `
//     <div class="post__body">
//       ${bodyContent}
//     </div>
//   `;

//   return body;
// }

// async function generateBodyContent(postContent) {

//   let content = "";

//   if (postContent.img) {
//     content += await generatePostImg(postContent.img);
//   }

//   if (postContent.text) {
//     content += `
//       <p class="post__text">
//         ${sanitizeText(postContent.text)}
//       </p>
//     `;
//   }

//   return content;
// }

// function generatePostImg(fileImg) {
//   let reader = new FileReader();

//   return new Promise((resolve, reject) => {
//     reader.onerror = () => {
//       reader.abort();
//       reject(new DOMException("Problem parsing input file."));
//     };

//     reader.onload = () => {
//       resolve(`<img class="post__img" src="${reader.result}" alt="" />`);
//     };
//     reader.readAsDataURL(fileImg);
//   });
// }



// function sanitizeText(text) {

//   var element = document.createElement("div");
//   element.innerText = text.trim();
//   return element.innerHTML;
// }


// function cleanCreatePost() {
//   createPostText.value = "";
//   removeCreatePostImg();
//   watchInputs();
// }

// function removeCreatePostImg() {
//   mediaContainer.innerHTML = "";
//   createPostMedia.value = "";
//   watchInputs();
// }


// function isValidImage(file) {
//   let isValid = isValidFileSize(file) && isValidFileSize(file);
//   return isValid;
// }

// function isValidFileType(file) {
//   const fileTypes = ["image/jpeg", "image/jpg", "image/png", "image/gif"];
//   return fileTypes.includes(file.type);
// }

// function isValidFileSize(file) {
//   if (file.size > 1048576) {
//     alert("Please upload an image smaller than 1MB");
//   }
//   return file.size < 1048576;
// }

function darkmode() {
  var element = document.body;
  element.classList.toggle("darkmode");
}

  $('#scroll').click(function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '1000');
  });

$(window).scroll(function () {
  var scroll = $(window).scrollTop();

  if (scroll >= 300) {
    $("#scroll").addClass("show");
  } else {
    $("#scroll").removeClass("show");
  }
});
