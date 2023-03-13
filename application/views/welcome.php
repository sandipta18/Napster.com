<?php 
session_start();
require_once 'loader.html';
require_once 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../../public/assets/css/homepage.css"> -->
    <!-- <script src="../../public/assets/js/home.js"></script> -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap");
:root {
  --primary-font: "Roboto", sans-serif;
  --secondary-font: "Montserrat", sans-serif;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  /* background-color: #385774; */
  background-color: #1d3041;
  font-family: var(--primary-font);
  font-size: 100%;
}

img {
  vertical-align: top;
}

/* Create post */
.create-post {
  width: 95%;
  max-width: 660px;
  margin: 50px auto;
  display: flex;
  gap: 20px;
}

.create-post__avatar {
  width: 65px;
  height: 65px;
  border-radius: 5px;
}

.create-post__form {
  background-color: #fff;
  padding: 20px;
  width: 100%;
  position: relative;
  border-radius: 5px;
}

.create-post__form::after {
  content: " ";
  position: absolute;
  width: 0;
  height: 0;
  left: -19px;
  right: auto;
  top: 20px;
  bottom: auto;
  border: 10px solid;
  border-color: transparent;
  border-right-color: #fff;
}

/* Dynamic height for text-area:
https://css-tricks.com/the-cleanest-trick-for-autogrowing-textareas/ */
.create-post__text-wrap {
  display: grid;
  margin-bottom: 20px;
}

.create-post__text-wrap::after {
  content: attr(data-replicated-value) " ";
  white-space: pre-wrap;
  visibility: hidden;
}

.create-post__text-wrap > textarea {
  min-height: 70px;
  font-size: 16px;
  color: #757a91;
  resize: none;
  overflow: hidden;
}

.create-post__text-wrap > textarea::-moz-placeholder {
  color: #999999;
}

.create-post__text-wrap > textarea:-ms-input-placeholder {
  color: #999999;
}

.create-post__text-wrap > textarea::placeholder {
  color: #999999;
}

.create-post__text-wrap > textarea,
.create-post__text-wrap::after {
  border: none;
  font: inherit;
  grid-area: 1/1/2/2;
  line-height: 1.5;
  word-break: break-all;
}

.create-post__media-wrap {
  margin-bottom: 20px;
}

.create-post__media-item {
  width: 100%;
  max-width: 140px;
  position: relative;
}

.create-post__media-item button {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: #fff;
  border: none;
  padding: 5px;
  border-radius: 50%;
}

.create-post__media-item img {
  width: 100%;
}

.create-post__buttons {
  display: flex;
  gap: 40px;
  justify-content: space-between;
}

.create-post__assets-buttons {
  width: 100%;
  display: grid;
  grid-template-columns: repeat(6, 1fr);
}

#create-post-media {
  display: none;
}

/* Post */
.post {
  width: 95%;
  max-width: 660px;
  margin: 0 auto 40px;
  display: flex;
  gap: 20px;
}

.post__avatar {
  width: 65px;
  height: 65px;
  border-radius: 5px;
}

.post__content {
  border-radius: 5px;
  width: 100%;
  padding: 20px;
  position: relative;
}

.post__content::after {
  content: " ";
  position: absolute;
  width: 0;
  height: 0;
  left: -19px;
  right: auto;
  top: 20px;
  bottom: auto;
  border: 10px solid;
  border-color: transparent;
  border-right-color: #fff;
}

.post__header {
  display: flex;
  gap: 15px;
  margin-bottom: 15px;
  align-items: center;
  font-family: var(--secondary-font);
  justify-content: space-between;
}

.post__user {
  font-weight: 600;
  font-size: 14px;
  color: #aeaeae;
}

.post__meta {
  display: flex;
  align-items: center;
  gap: 15px;
}

.post__reblogs {
  color: #fff;
  font-size: 12px;
  font-weight: bold;
  display: inline-block;
  padding: 3px 5px;
  background-color: #aeaeae;
  border-radius: 5px;
}

.post__header-btn {
  border: none;
  background-color: transparent;
  width: 20px;
}

.post__content {
  background-color: #fff;
}

.post__body {
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
  margin-bottom: 15px;
}

.post__text {
  font-size: 16px;
  color: #000;
  line-height: 1.5;
}

.post__img {
  width: 100%;
}

.post__footer {
  color: #aeaeae;
  font-size: 14px;
}

/* Buttons */
.create-post__submit {
  background: none;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

.create-post__asset-btn {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 5px 15px;
  color: #51595e;
  font-size: 16px;
  gap: 10px;
  background: none;
  border: none;
}

.create-post__asset-btn:not(:last-child) {
  border-right: 1px solid rgba(100, 117, 137, 0.2);
}

.create-post__asset-btn:disabled {
  opacity: 0.3;
}

.create-post__asset-btn .icon {
  transition: all 0.3s ease;
  width: 40px;
  height: 35px;
}

.create-post__asset-btn:not(:disabled):hover .icon,
.create-post__asset-btn:not(:disabled):focus .icon {
  transform: translateY(-3px);
}

.create-post__submit {
  background-color: #5596e6;
  border: 1px solid transparent;
  border: none;
  color: #fff;
  font-family: inherit;
  font-size: 16px;
  padding: 5px 15px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.create-post__submit:disabled {
  background-color: #baebff;
}
    </style>
    <title>Home</title>
</head>
<body>
<section class="create-post">
	<img class="create-post__avatar" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/avatar-tumblr.png" alt="" />
	<form id="create-post-form" class="create-post__form" action="">
		<div class="create-post__text-wrap">
			<textarea aria-label="Write something about you..." name="post-text" id="create-post-txt" oninput="this.parentNode.dataset.replicatedValue = this.value" placeholder="Write something about you..."></textarea>
		</div>

		<div class="create-post__media-wrap" id="create-post-media-wrap"></div>

		<div class="create-post__buttons">
			<div class="create-post__assets-buttons">
				<button type="button" aria-label="Add an image to the post" class="create-post__asset-btn" for="create-post-media" onclick="this.querySelector('input').click()">
					<img class="icon" src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/camera-tumblr.svg" alt="" />
					Photo
					<input type="file" name="post-img" id="create-post-media" accept=".png, .jpg, .jpeg, .gif" />
				</button>
				<button type="button" aria-label="Add a video to the post" class="create-post__asset-btn" for="create-post-media" disabled>
					<img class="icon" src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/quote-tumblr.svg" alt="" />
					Quote
				</button>
				<button type="button" aria-label="Add a video to the post" class="create-post__asset-btn" for="create-post-media" disabled>
					<img class="icon" src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/link-tumblr.svg" alt="" />
					Link
				</button>
				<button type="button" aria-label="Add a video to the post" class="create-post__asset-btn" for="create-post-media" disabled>
					<img class="icon" src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/chat-tumblr.svg" alt="" />
					Chat
				</button>
				<button type="button" aria-label="Add a video to the post" class="create-post__asset-btn" for="create-post-media" disabled>
					<img class="icon" src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/audio-tumblr.svg" alt="" />
					Audio
				</button>
				<button type="button" aria-label="Add a video to the post" class="create-post__asset-btn" for="create-post-media" disabled>
					<img class="icon" src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/video-tumblr.svg" alt="" />
					Video
				</button>
			</div>
			<button class="create-post__submit" type="submit" disabled id="create-post-submit-btn">Publish</button>
		</div>
	</form>
</section>

<section id="posts-container">
	<article class="post">
		<img class="post__avatar" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/avatar-tumblr.png" alt="" />

		<div class="post__content">
			<header class="post__header">
				<p class="post__user"> <?php echo $_SESSION['name']; ?></p>

				<div class="post__meta">
					<p class="post__reblogs">3,908</p>

					<button class="post__header-btn">
						<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/reblog-tumblr.svg" alt="" />
					</button>
					<button class="post__header-btn">
						<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/heart-tumblr.svg" alt="" />
					</button>
				</div>
			</header>

			<div class="post__body">
				<img class="post__img" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/liz-lee.jpg" alt="" />
				<a href="https://es.wikipedia.org/wiki/My_Life_as_Liz" class="post__text">My Life As Liz</a>
			</div>

			
		</div>
	</article>

	<article class="post">
		<img class="post__avatar" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/avatar-tumblr.png" alt="" />

		<div class="post__content">
			<header class="post__header">
				<p class="post__user">galactiqangel</p>

				<div class="post__meta">
					<p class="post__reblogs">3,908</p>

					<button class="post__header-btn">
						<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/reblog-tumblr.svg" alt="" />
					</button>
					<button class="post__header-btn">
						<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/heart-tumblr.svg" alt="" />
					</button>
				</div>
			</header>

			<div class="post__body">
				<img class="post__img" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/steven-universe.webp" alt="" />
				<a href="https://es.wikipedia.org/wiki/Steven_Universe" class="post__text">Steven Universe</a>
			</div>

			<div class="post__footer">
				<span>#2010s</span>
				<span>#tumblr</span>
				<span>#codepen</span>
			</div>
		</div>
	</article>

	<article class="post">
		<img class="post__avatar" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/avatar-tumblr.png" alt="" />

		<div class="post__content">
			<header class="post__header">
				<p class="post__user">galactiqangel</p>

				<div class="post__meta">
					<p class="post__reblogs">3,908</p>

					<button class="post__header-btn">
						<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/reblog-tumblr.svg" alt="" />
					</button>
					<button class="post__header-btn">
						<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/heart-tumblr.svg" alt="" />
					</button>
				</div>
			</header>

			<div class="post__body">
				<img class="post__img" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/catching-fire.webp" alt="" />
				<a href="https://en.wikipedia.org/wiki/The_Hunger_Games:_Catching_Fire" class="post__text">The Hunger Games...?</a>
			</div>

			<div class="post__footer">
				<span>#2010s</span>
				<span>#tumblr</span>
				<span>#codepen</span>
			</div>
		</div>
	</article>

	<article class="post">
		<img class="post__avatar" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/avatar-tumblr.png" alt="" />

		<div class="post__content">
			<header class="post__header">
				<p class="post__user">galactiqangel</p>

				<div class="post__meta">
					<p class="post__reblogs">3,908</p>

					<button class="post__header-btn">
						<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/reblog-tumblr.svg" alt="" />
					</button>
					<button class="post__header-btn">
						<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/heart-tumblr.svg" alt="" />
					</button>
				</div>
			</header>

			<div class="post__body">
				<img class="post__img" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/icecream-twerk.webp" alt="" />
			</div>

			<div class="post__footer">
				<span>#2010s</span>
				<span>#tumblr</span>
				<span>#codepen</span>
			</div>
		</div>
	</article>
</section>

</body>
</html>
<script>
    let createPostForm = document.querySelector("#create-post-form");
let createPostMedia = document.querySelector("#create-post-media");
let createPostText = document.querySelector("#create-post-txt");
let createPostSubmitBtn = document.querySelector("#create-post-submit-btn");
let mediaLabel = document.querySelector('[for="create-post-media"]');
let postsContainer = document.querySelector("#posts-container");
let mediaContainer = document.querySelector("#create-post-media-wrap");

mediaLabel.addEventListener("keypress", (e) => {
	if (e.key === "Enter") {
		e.target.click();
	}
});

createPostForm.addEventListener("submit", handleSubmit, false);
createPostMedia.addEventListener("input", handleAddImg, false);

createPostText.addEventListener("input", watchInputs, false);
createPostMedia.addEventListener("change", watchInputs, false);

function watchInputs() {
	if (createPostText.value === "" && createPostMedia.value === "") {
		createPostSubmitBtn.setAttribute("disabled", "true");
		createPostForm.removeEventListener("submit", handleSubmit, false);
	} else {
		createPostSubmitBtn.removeAttribute("disabled");
		createPostForm.addEventListener("submit", handleSubmit, false);
	}
}

function generateImgPreview(file) {
	let reader = new FileReader();

	reader.readAsDataURL(file);
	reader.onloadend = () => {
		let preview = `
			<figure class="create-post__media-item">
				<button type="button" aria-label="delete image">
					<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/close.svg" alt="" />
				</button>
				<img src="${reader.result}" alt="" />
			</figure>	
		`;

		mediaContainer.innerHTML = preview;

		let closeBtn = mediaContainer.querySelector("button");
		closeBtn.addEventListener("click", removeCreatePostImg, false);
	};
}

function handleAddImg(e) {
	const file = e.target.files[0];

	if (!isValidImage(file)) {
		createPostMedia.value = "";
		return;
	}

	generateImgPreview(file);
}

watchInputs();

/* Generate post functions */
async function handleSubmit(e) {
	e.preventDefault();

	let postContent = {
		text: createPostText.value,
		img: createPostMedia.files[0]
	};

	let post = await createPost(postContent);
	postsContainer.insertAdjacentHTML("afterbegin", post);
	cleanCreatePost();
}

async function createPost(postContent) {
	let header = generateHeader();
	let body = await generateBody(postContent);
	let footer = generateFooter();

	let post = `
		<article class="post">
			<img class="post__avatar" src="https://raw.githubusercontent.com/Javieer57/create-post-component/design/2010/img/avatar-tumblr.png" alt="" />
		
			<div class="post__content">
				${header}
				${body}
				${footer}
			</div>
		</article>
	`;

	return post;
}

function generateHeader() {
	let header = `
		<header class="post__header">
			<p class="post__user">galactiqangel</p>

			<div class="post__meta">
				<p class="post__reblogs">3,908</p>

				<button class="post__header-btn">
					<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/reblog-tumblr.svg" alt="" />
				</button>
				<button class="post__header-btn">
					<img src="https://raw.githubusercontent.com/Javieer57/create-post-component/43c8008a45b699957d2070cc23362f1953c65d78/icons/heart-tumblr.svg" alt="" />
				</button>
			</div>
		</header>
	`;

	return header;
}

async function generateBody(postContent) {
	let bodyContent = await generateBodyContent(postContent);

	let body = `
		<div class="post__body">
			${bodyContent}
		</div>
	`;

	return body;
}

async function generateBodyContent(postContent) {
	// https://benhoyt.com/writings/dont-sanitize-do-escape/
	let content = "";

	if (postContent.img) {
		content += await generatePostImg(postContent.img);
	}

	if (postContent.text) {
		// https://stackoverflow.com/questions/863779/how-to-add-line-breaks-to-an-html-textarea
		content += `
			<p class="post__text">
				${sanitizeText(postContent.text)}
			</p>
		`;
	}

	return content;
}

function generatePostImg(fileImg) {
	// https://codepen.io/Anveio/pen/XzYBzX
	let reader = new FileReader();

	return new Promise((resolve, reject) => {
		reader.onerror = () => {
			reader.abort();
			reject(new DOMException("Problem parsing input file."));
		};

		reader.onload = () => {
			resolve(`<img class="post__img" src="${reader.result}" alt="" />`);
		};
		reader.readAsDataURL(fileImg);
	});
}

function generateFooter() {
	let footer = `
	<div class="post__footer">
		<span>#2010s</span>
		<span>#tumblr</span>
		<span>#codepen</span>
	</div>
	`;

	return footer;
}

/* Sanitization functions  */
function sanitizeText(text) {
	// https://remarkablemark.org/blog/2019/11/29/javascript-sanitize-html/
	var element = document.createElement("div");
	element.innerText = text.trim();
	return element.innerHTML;
}

/* Clean functions */
function cleanCreatePost() {
	createPostText.value = "";
	removeCreatePostImg();
	watchInputs();
}

function removeCreatePostImg() {
	mediaContainer.innerHTML = "";
	createPostMedia.value = "";
	watchInputs();
}

/* Image validation images */
function isValidImage(file) {
	let isValid = isValidFileSize(file) && isValidFileSize(file);
	return isValid;
}

function isValidFileType(file) {
	const fileTypes = ["image/jpeg", "image/jpg", "image/png", "image/gif"];
	return fileTypes.includes(file.type);
}

function isValidFileSize(file) {
	if (file.size > 1048576) {
		alert("Please upload an image smaller than 1MB");
	}
	return file.size < 1048576;
}

</script>