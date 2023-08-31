import { useBlockProps } from '@wordpress/block-editor';

export default function save(props) {
    const { attributes } = props;
    const { iframeData } = attributes;
	return (
		<div { ...useBlockProps.save() }>
			<iframe
                src={ iframeData.url }
                height={ iframeData.height }
                width={ iframeData.width }
                allowFullScreen={ iframeData.allowFullScreen }
                allowTransparency={ iframeData.allowTransparency }
                border={ iframeData.frameBorder }
                title={ iframeData.title }
                name={ iframeData.name }
                loading={ iframeData.loading }
                id={ iframeData.id }
                className={ iframeData.class }
                // style={ iframeData.style }
                sandbox={ iframeData.sandbox }
            />
		</div>
	);
}
