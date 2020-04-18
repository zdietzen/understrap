<?php
/**
 * Comment layout
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Add Bootstrap classes to comment form fields.
add_filter( 'comment_form_default_fields', 'understrap_bootstrap_comment_form_fields' );

if ( ! function_exists( 'understrap_bootstrap_comment_form_fields' ) ) {
	/**
	 * Add Bootstrap classes to WP's comment form default fields.
	 *
	 * @param array $fields {
	 *     Default comment fields.
	 *
	 *     @type string $author  Comment author field HTML.
	 *     @type string $email   Comment author email field HTML.
	 *     @type string $url     Comment author URL field HTML.
	 *     @type string $cookies Comment cookie opt-in field HTML.
	 * }
	 *
	 * @return array
	 */
	function understrap_bootstrap_comment_form_fields( $fields ) {

		$replace = array(
			'<p class="' => '<div class="form-group ',
			'<input'     => '<input class="form-control" ',
			'</p>'       => '</div>',
		);

		if ( isset( $fields['author'] ) ) {
			$fields['author'] = strtr( $fields['author'], $replace );
		}
		if ( isset( $fields['email'] ) ) {
			$fields['email'] = strtr( $fields['email'], $replace );
		}
		if ( isset( $fields['url'] ) ) {
			$fields['url'] = strtr( $fields['url'], $replace );
		}

		$replace = array(
			'<p class="' => '<div class="form-group form-check ',
			'<input'     => '<input class="form-check-input" ',
			'<label'     => '<label class="form-check-label" ',
			'</p>'       => '</div>',
		);
		if ( isset( $fields['cookies'] ) ) {
			$fields['cookies'] = strtr( $fields['cookies'], $replace );
		}

		return $fields;
	}
} // End of if function_exists( 'understrap_bootstrap_comment_form_fields' )

// Add Bootstrap classes to comment form submit button and comment field.
add_filter( 'comment_form_defaults', 'understrap_bootstrap_comment_form' );

if ( ! function_exists( 'understrap_bootstrap_comment_form' ) ) {
	/**
	 * Builds the form.
	 *
	 * @param string[] $args Comment form arguments and fields.
	 *
	 * @return string[]
	 */
	function understrap_bootstrap_comment_form( $args ) {
		$replace = array(
			'<p class="' => '<div class="form-group ',
			'<textarea'  => '<textarea class="form-control" ',
			'</p>'       => '</div>',
		);

		if ( isset( $args['comment_field'] ) ) {
			$args['comment_field'] = strtr( $args['comment_field'], $replace );
		}

		if ( isset( $args['class_submit'] ) ) {
			$args['class_submit'] = 'btn btn-secondary';
		}

		return $args;
	}
} // End of if function_exists( 'understrap_bootstrap_comment_form' ).
