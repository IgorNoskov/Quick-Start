<?php
/**
 * Theme sanitizer
 *
 * @package WordPress
 * @subpackage quick-start
 * @since 1.0.0
 * @version 1.0.0
 */


/**
 * Theme sanitize static class.
 *
 * @since 1.0.0
 */
class Theme_Sanitizer {

	/**
	 * Sanitizes number.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $input
	 *
	 * @return int
	 */
	public static function sanitize_number_int( $input ) {
		return filter_var( $input, FILTER_SANITIZE_NUMBER_INT );
	}

	/**
	 * Sanitizes number float.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $input
	 *
	 * @return float
	 */
	public static function sanitize_number_float( $input ) {
		return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
	}

	/**
	 * Sanitizes telephone number.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $input
	 *
	 * @return int
	 */
	public static function sanitize_tel( $input ) {
		return preg_replace( '~[^0-9]+~', '', $input );
	}

	/**
	 * Sanitizes time value.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $input
	 *
	 * @return string
	 */
	public static function sanitize_time( $input ) {
		$date = new DateTime( $input );

		return $date->format( 'H:i:s' );
	}

	/**
	 * Sanitizes date value.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $input
	 *
	 * @return string
	 */
	public static function sanitize_date( $input ) {
		$date = new DateTime( $input );

		return $date->format( 'Y-m-d' );
	}

	/**
	 * Sanitizes date time value.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $input
	 *
	 * @return string
	 */
	public static function sanitize_datetime( $input ) {
		$date = new DateTime( $input );

		return $date->format( 'Y-m-d H:i:s' );
	}

	/**
	 * Sanitizes week value.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $input
	 *
	 * @return string
	 */
	public static function sanitize_week( $input ) {
		$date = new DateTime( $input );

		return $date->format( 'Y-\WW' );
	}

	/**
	 * Sanitizes checkbox.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $input
	 *
	 * @return boolean
	 */
	public static function sanitize_checkbox( $input ) {
		return ( isset( $input ) ? (bool) $input : false );
	}

	/**
	 * Sanitizes customizer select field.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed $input
	 * @param object $setting
	 *
	 * @return mixed
	 */
	public static function sanitize_customizer_select( $input, $setting ) {
		$input   = sanitize_key( $input );
		$choices = $setting->manager->get_control( $setting->id )->choices;

		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

	/**
	 * Sanitizes customizer file field.
	 *
	 * @since 1.0.0
	 *
	 * @param string $file
	 * @param object $setting
	 *
	 * @return string
	 */
	public static function sanitize_customizer_file( $file, $setting ) {

		//allowed file types
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png'
		);

		$file_ext = wp_check_filetype( $file, $mimes );

		//if file has a valid mime type return it, otherwise return default
		return ( $file_ext['ext'] ? $file : $setting->default );
	}
}
