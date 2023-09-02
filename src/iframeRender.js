
const Render = ({iframeData}) => {

	const isPro = ultraEmbed.can_use_premium_code;

	const iframeAttributes = {
		src: iframeData.url,
		height: iframeData.height,
		width: iframeData.width,
		allowFullScreen: iframeData.allowFullScreen,
		frameBorder: iframeData.frameBorder,
	};

	if (isPro) {
		if (iframeData.loading) {
			iframeAttributes.loading = iframeData.loading;
		}

		if (iframeData.sandbox) {
			iframeAttributes.sandbox = iframeData.sandbox;
		}

		if (iframeData.name) {
			iframeAttributes.name = iframeData.name;
		}

		if (iframeData.id) {
			iframeAttributes.id = iframeData.id;
		}

		if (iframeData.class) {
			iframeAttributes.class = iframeData.class;
		}

		if (iframeData.title) {
			iframeAttributes.title = iframeData.title;
		}
	}

	return (
		<>
			{
				isPro && iframeData.style && (
					<style>
						{`.ultradevs-iframe-block iframe { ${iframeData.style} }`}
					</style>
				)
			}
			<iframe
				{...iframeAttributes}
			></iframe>
		</>
	)
}

export default Render