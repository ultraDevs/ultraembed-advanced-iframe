import { __ } from '@wordpress/i18n';
import { useState } from '@wordpress/element';

import {
    useBlockProps,
    InspectorControls,   
} from '@wordpress/block-editor';

import {
    PanelBody,
    TextControl,
    ToggleControl,
    TextareaControl,
	Button,
	SelectControl,
} from '@wordpress/components';

import './editor.scss';
import Render from './iframeRender';

export default function Edit(props) {
    const { attributes, setAttributes } = props;
    const { iframeData } = attributes;

	const [isExpanded, setIsExpanded] = useState(false);

	const isPro = ultraEmbed.can_use_premium_code;

	return (
		<>
            <InspectorControls>
                <PanelBody title={ __( 'iFrame Settings', 'ultraembed-advanced-iframe' ) }>
                    <TextControl
                        label={ __( 'URL', 'ultraembed-advanced-iframe' ) }
                        value={ iframeData.url }
                        onChange={ ( url ) => setAttributes( { iframeData: { ...iframeData, url } } ) }
                    />
                    <TextControl
                        label={ __( 'Height', 'ultraembed-advanced-iframe' ) }
                        value={ iframeData.height }
                        onChange={ ( height ) => setAttributes( { iframeData: { ...iframeData, height } } ) }
                    />
                    <TextControl
                        label={ __( 'Width', 'ultraembed-advanced-iframe' ) }
                        value={ iframeData.width }
                        onChange={ ( width ) => setAttributes( { iframeData: { ...iframeData, width } } ) }
                    />
                    <ToggleControl
                        label={ __( 'Allow Full Screen', 'ultraembed-advanced-iframe' ) }
                        checked={ iframeData.allowFullScreen }
                        onChange={ ( allowFullScreen ) => setAttributes( { iframeData: { ...iframeData, allowFullScreen } } ) }
                    />
                    
                    <ToggleControl
                        label={ __( 'Scrolling', 'ultraembed-advanced-iframe' ) }
                        checked={ iframeData.scrolling }
                        onChange={ ( scrolling ) => setAttributes( { iframeData: { ...iframeData, scrolling } } ) }
                    />

                    <TextControl
                        label={ __( 'Frame Border', 'ultraembed-advanced-iframe' ) }
                        value={ iframeData.frameBorder }
                        onChange={ ( frameBorder ) => setAttributes( { iframeData: { ...iframeData, frameBorder } } ) }
                    />

                    {/* <TextareaControl
                        label={ __( 'Style', 'ultraembed-advanced-iframe' ) }
                        value={ iframeData.style }
                        onChange={ ( style ) => setAttributes( { iframeData: { ...iframeData, style } } ) }
                    /> */}

                    
                </PanelBody>
				<PanelBody title={ __( 'Pro Settings', 'ultraembed-advanced-iframe' ) }>
					{
						isPro ? (
							<>
								<SelectControl
									label={ __( 'Loading', 'ultraembed-advanced-iframe' ) }
									value={ iframeData.loading }
									options={ [
										{ label: __( 'Auto', 'ultraembed-advanced-iframe' ), value: '' },
										{ label: __( 'Eager', 'ultraembed-advanced-iframe' ), value: 'eager' },
										{ label: __( 'Lazy', 'ultraembed-advanced-iframe' ), value: 'lazy' },
									] }
									onChange={ ( loading ) => setAttributes( { iframeData: { ...iframeData, loading } } ) }
								/>
								<TextControl
									label={ __( 'Title', 'ultraembed-advanced-iframe' ) }
									value={ iframeData.title }
									onChange={ ( title ) => setAttributes( { iframeData: { ...iframeData, title } } ) }
								/>

								<TextControl
									label={ __( 'Name', 'ultraembed-advanced-iframe' ) }
									value={ iframeData.name }
									onChange={ ( name ) => setAttributes( { iframeData: { ...iframeData, name } } ) }
								/>

								<TextControl
									label={ __( 'ID', 'ultraembed-advanced-iframe' ) }
									value={ iframeData.id }
									onChange={ ( id ) => setAttributes( { iframeData: { ...iframeData, id } } ) }
								/>

								<TextControl
									label={ __( 'Class', 'ultraembed-advanced-iframe' ) }
									value={ iframeData.class }
									onChange={ ( classs ) => setAttributes( { iframeData: { ...iframeData, class: classs } } ) }
								/>
								<TextareaControl
									label={ __( 'Style', 'ultraembed-advanced-iframe' ) }
									value={ iframeData.style }
									onChange={ ( style ) => setAttributes( { iframeData: { ...iframeData, style } } ) }
								/>
								<TextControl
									label={ __( 'Sandbox', 'ultraembed-advanced-iframe' ) }
									value={ iframeData.sandbox }
									onChange={ ( sandbox ) => setAttributes( { iframeData: { ...iframeData, sandbox } } ) }
								/>
							</>
						) : (
							<div className='ud-iframe-pro'>
								<p>{ __( 'Upgrade to Pro to get more settings', 'ultraembed-advanced-iframe' ) }</p>
								<ul>
									<li>
										Iframe - ( <a href="https://web.dev/iframe-lazy-loading/" target="_blank" rel="noopener noreferrer">Details</a> )
									</li>
									<li>
										Title - ( <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#attr-title" target="_blank" rel="noopener noreferrer">Details</a> )
									</li>
									<li>
										Name - ( <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#attr-name" target="_blank" rel="noopener noreferrer">Details</a> )
									</li>
									<li>
										ID - ( <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id" target="_blank" rel="noopener noreferrer">Details</a> )
									</li>
									<li>
										Class - ( <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class" target="_blank" rel="noopener noreferrer">Details</a> )
									</li>
									<li>
										Style - ( <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/style" target="_blank" rel="noopener noreferrer">Details</a> )
									</li>
									<li>
										Sandbox - ( <a href="https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe#attr-sandbox" target="_blank" rel="noopener noreferrer">Details</a> )
									</li>
								</ul>
							</div>
						)
					}
				</PanelBody>
            </InspectorControls>

            <div { ...useBlockProps({
				className: 'ultradevs-iframe-block',
				style: {
					'--ud-iframe-border' : iframeData.frameBorder ? iframeData.frameBorder + 'px' : '0px',
				}
			}) }>
				<div className="ultradevs-iframe-block-placeholder">
					<Button
						className="ultradevs-iframe-block-placeholder__button"
						onClick={ () => setIsExpanded( !isExpanded ) }
						isPrimary
					>
						{
							isExpanded ? (
								__( 'Hide iFrame', 'ultraembed-advanced-iframe' )
							) : (
								__( 'Show iFrame', 'ultraembed-advanced-iframe' )
							)
						}
					</Button>
				</div>
				{
					isExpanded ? (
						<Render iframeData={ iframeData } />
					) : null
				}
            </div>
        </>
	);
}
