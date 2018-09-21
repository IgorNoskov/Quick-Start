<?php
/**
 * Theme validator
 *
 * @package WordPress
 * @subpackage quick-start
 * @since 1.0.0
 * @version 1.0.0
 */


/**
 * Theme validates static class.
 *
 * @since 1.0.0
 */
class Theme_Validator {

	/**
	 * Validates customizer tel field.
	 *
	 * @since 1.0.0
	 *
	 * @param object $validity
	 * @param string $value
	 *
	 * @return object
	 */
	public static function validate_customizer_tel( $validity, $value ) {

		if ( '' !== $value && preg_match( '~[^0-9]+~', $value ) ) {
			$validity->add( 'error', __( 'Telephone is incorrect.', 'quick-start' ) );
		}

		return $validity;
	}

	/**
	 * Validates customizer number field.
	 *
	 * @since 1.0.0
	 *
	 * @param object $validity
	 * @param string $value
	 *
	 * @return object
	 */

	public static function validate_customizer_number( $validity, $value ) {

		if ( '' !== $value && ! is_numeric( $value ) ) {
			$validity->add( 'error', __( 'Value is incorrect.', 'quick-start' ) );
		}

		return $validity;
	}

	/**
	 * Validates customizer url field.
	 *
	 * @since 1.0.0
	 *
	 * @param object $validity
	 * @param string $value
	 *
	 * @return object
	 */
	public static function validate_customizer_url( $validity, $value ) {

		if ( '' !== $value && filter_var( $value, FILTER_VALIDATE_URL ) === false ) {
			$validity->add( 'error', __( 'Url is incorrect.', 'quick-start' ) );
		}

		return $validity;
	}

	/**
	 * Validates customizer email field.
	 *
	 * @since 1.0.0
	 *
	 * @param object $validity
	 * @param string $value
	 *
	 * @return object
	 */
	public static function validate_customizer_email( $validity, $value ) {

		if ( '' !== $value && filter_var( $value, FILTER_VALIDATE_EMAIL ) === false ) {
			$validity->add( 'error', __( 'Email is incorrect.', 'quick-start' ) );
		}

		return $validity;
	}
}
