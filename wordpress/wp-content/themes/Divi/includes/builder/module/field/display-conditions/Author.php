<?php
/**
 * Author Condition's logic swiftly crafted.
 *
 * @since 4.11.0
 *
 * @package     Divi
 * @sub-package Builder
 */

namespace Module\Field\DisplayConditions;

/**
 * Author Condition Trait
 */
trait AuthorCondition {

	/**
	 * Processes "Author" condition.
	 *
	 * @since 4.11.0
	 *
	 * @param  array $condition_settings Containing all condition settings.
	 *
	 * @return boolean Condition output.
	 */
	protected function _process_author_condition( $condition_settings ) {
		// Only check for Posts.
		if ( ! is_singular() ) {
			return false;
		}

		$display_rule           = isset( $condition_settings['authorDisplay'] ) ? $condition_settings['authorDisplay'] : '';
		$authors_raw            = isset( $condition_settings['authors'] ) ? $condition_settings['authors'] : [];
		$authors_ids            = array_map(
			function( $item ) {
				return $item['value'];
			},
			$authors_raw
		);
		$current_post_author_id = get_post_field( 'post_author', get_queried_object_id() );

		$should_display = array_intersect( $authors_ids, (array) $current_post_author_id ) ? true : false;

		return ( 'is' === $display_rule ) ? $should_display : ! $should_display;
	}

}
