import { __ } from '@wordpress/i18n';

import {
    useBlockProps,
    InspectorControls,   
} from '@wordpress/block-editor';

import {
    PanelBody,
    TextControl,
    ToggleControl,
    TextareaControl,
} from '@wordpress/components';

import './editor.scss';


export default function Edit(props) {
    const { attributes, setAttributes } = props;
    const { iframeData } = attributes;

	return (
		<>
            <InspectorControls>
                <PanelBody title={ __( 'iFrame Settings', 'ultradevs-iframe' ) }>
                    <TextControl
                        label={ __( 'URL', 'ultradevs-iframe' ) }
                        value={ iframeData.url }
                        onChange={ ( url ) => setAttributes( { iframeData: { ...iframeData, url } } ) }
                    />
                    <TextControl
                        label={ __( 'Height', 'ultradevs-iframe' ) }
                        value={ iframeData.height }
                        onChange={ ( height ) => setAttributes( { iframeData: { ...iframeData, height } } ) }
                    />
                    <TextControl
                        label={ __( 'Width', 'ultradevs-iframe' ) }
                        value={ iframeData.width }
                        onChange={ ( width ) => setAttributes( { iframeData: { ...iframeData, width } } ) }
                    />
                    <ToggleControl
                        label={ __( 'Allow Full Screen', 'ultradevs-iframe' ) }
                        checked={ iframeData.allowFullScreen }
                        onChange={ ( allowFullScreen ) => setAttributes( { iframeData: { ...iframeData, allowFullScreen } } ) }
                    />
                    <ToggleControl
                        label={ __( 'Allow Transparency', 'ultradevs-iframe' ) }
                        checked={ iframeData.allowTransparency }
                        onChange={ ( allowTransparency ) => setAttributes( { iframeData: { ...iframeData, allowTransparency } } ) }
                    />
                    <ToggleControl
                        label={ __( 'Scrolling', 'ultradevs-iframe' ) }
                        checked={ iframeData.scrolling }
                        onChange={ ( scrolling ) => setAttributes( { iframeData: { ...iframeData, scrolling } } ) }
                    />

                    <TextControl
                        label={ __( 'Frame Border', 'ultradevs-iframe' ) }
                        value={ iframeData.frameBorder }
                        onChange={ ( frameBorder ) => setAttributes( { iframeData: { ...iframeData, frameBorder } } ) }
                    />

                    <TextControl
                        label={ __( 'Title', 'ultradevs-iframe' ) }
                        value={ iframeData.title }
                        onChange={ ( title ) => setAttributes( { iframeData: { ...iframeData, title } } ) }
                    />

                    <TextControl
                        label={ __( 'Name', 'ultradevs-iframe' ) }
                        value={ iframeData.name }
                        onChange={ ( name ) => setAttributes( { iframeData: { ...iframeData, name } } ) }
                    />

                    <TextControl
                        label={ __( 'ID', 'ultradevs-iframe' ) }
                        value={ iframeData.id }
                        onChange={ ( id ) => setAttributes( { iframeData: { ...iframeData, id } } ) }
                    />

                    <TextControl
                        label={ __( 'Class', 'ultradevs-iframe' ) }
                        value={ iframeData.class }
                        onChange={ ( classs ) => setAttributes( { iframeData: { ...iframeData, class: classs } } ) }
                    />

                    <TextareaControl
                        label={ __( 'Style', 'ultradevs-iframe' ) }
                        value={ iframeData.style }
                        onChange={ ( style ) => setAttributes( { iframeData: { ...iframeData, style } } ) }
                    />

                    <TextControl
                        label={ __( 'Sandbox', 'ultradevs-iframe' ) }
                        value={ iframeData.sandbox }
                        onChange={ ( sandbox ) => setAttributes( { iframeData: { ...iframeData, sandbox } } ) }
                    />
                </PanelBody>
            </InspectorControls>

            <div { ...useBlockProps() }>
                <iframe
                    src={ iframeData.url }
                    height={ iframeData.height }
                    width={ iframeData.width }
                    allowFullScreen={ iframeData.allowFullScreen }
                    allowTransparency={ iframeData.allowTransparency }
                    border={ iframeData.frameBorder }
                    title={ iframeData.title }
                    name={ iframeData.name }
                    id={ iframeData.id }
                    class={ iframeData.class }
                    loading={ iframeData.loading }
                    // style={ iframeData.style }
                    sandbox={ iframeData.sandbox }
                ></iframe>
            </div>
        </>
	);
}
