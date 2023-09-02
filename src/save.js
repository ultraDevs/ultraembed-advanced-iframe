import { useBlockProps } from '@wordpress/block-editor';
import Render from './iframeRender';

export default function save(props) {
    const { attributes } = props;
    const { iframeData } = attributes;
	return (
		<div { ...useBlockProps.save({
			className: 'ultradevs-iframe-block',
			style: {
				'--ud-iframe-border' : iframeData.frameBorder ? iframeData.frameBorder + 'px' : '0px',
			}
		}) }>
			<Render iframeData={ iframeData } />
		</div>
	);
}
