const refreshImage = imageElement => {
  const imageUrl = new URL(imageElement.src);
  imageUrl.search = '?time=' + new Date().getTime();
  imageElement.src = imageUrl.toString();
}

export default refreshImage;
