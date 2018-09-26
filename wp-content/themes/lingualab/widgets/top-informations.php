<?php

class TopInformations_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'topinformations_widget', // Base ID
			esc_html__( 'Informacje w nagłówku', 'lingualab' ), // Name
			array( 'description' => esc_html__( 'W tym miejscu możliwa jest zmiana informacji w nagłówku', 'text_domlingualabain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$locationName1 = ! empty( $instance['locationname_1'] ) ? $instance['locationname_1'] : '';
        $phone1 = ! empty( $instance['phone_1'] ) ? $instance['phone_1'] : '';
        $locationName2 = ! empty( $instance['locationname_2'] ) ? $instance['locationname_2'] : '';
        $phone2 = ! empty( $instance['phone_2'] ) ? $instance['phone_2'] : '';
		$email = ! empty( $instance['email'] ) ? $instance['email'] : '';

		echo $args['before_widget'];
		echo '<div class="topContact">';

		echo '<div class="topContactPosition topContactPhone">';
		echo '<span class="topContactLabel">'.$locationName1 .' </span>';
		echo '<span class="topNumber">'.$phone1 .' </span>';
		echo '</div>';

		echo '<div class="topContactPosition">';
		echo '<span class="topContactLabel">'.$locationName2 .' </span>';
		echo '<span class="topNumber">'.$phone2 .' </span>';
		echo '</div>';

		echo '<div class="topContactPosition topContactMail">';
		echo '<a href="mailto:' .$email. '">' .$email. '</a>';
		echo '</div>';

		echo '</div>';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $locationName1 = ! empty( $instance['locationname_1'] ) ? $instance['locationname_1'] : '';
        $phone1 = ! empty( $instance['phone_1'] ) ? $instance['phone_1'] : '';
        $locationName2 = ! empty( $instance['locationname_2'] ) ? $instance['locationname_2'] : '';
        $phone2 = ! empty( $instance['phone_2'] ) ? $instance['phone_2'] : '';
        $email = ! empty( $instance['email'] ) ? $instance['email'] : '';

		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'locationname_1' ) ); ?>"><?php esc_attr_e( 'Miejscowość 1:', 'lingualab' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'locationname_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'locationname_1' ) ); ?>" type="text" value="<?php echo esc_attr( $locationName1 ); ?>">
        </p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'phone_1' ) ); ?>"><?php esc_attr_e( 'Telefon 1:', 'lingualab' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone_1' ) ); ?>" type="text" value="<?php echo esc_attr( $phone1 ); ?>">
        </p>

        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'locationname_2' ) ); ?>"><?php esc_attr_e( 'Miejscowość 2:', 'lingualab' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'locationname_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'locationname_2' ) ); ?>" type="text" value="<?php echo esc_attr( $locationName2 ); ?>">
        </p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'phone_2' ) ); ?>"><?php esc_attr_e( 'Telefon 2:', 'lingualab' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone_2' ) ); ?>" type="text" value="<?php echo esc_attr( $phone2 ); ?>">
        </p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'E-mail:', 'lingualab' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['locationname_1'] = ( ! empty( $new_instance['locationname_1'] ) ) ? sanitize_text_field( $new_instance['locationname_1'] ) : '';
        $instance['phone_1'] = ( ! empty( $new_instance['phone_1'] ) ) ? sanitize_text_field( $new_instance['phone_1'] ) : '';

        $instance['locationname_2'] = ( ! empty( $new_instance['locationname_2'] ) ) ? sanitize_text_field( $new_instance['locationname_2'] ) : '';
        $instance['phone_2'] = ( ! empty( $new_instance['phone_2'] ) ) ? sanitize_text_field( $new_instance['phone_2'] ) : '';

        $instance['email'] = ( ! empty( $new_instance['email'] ) ) ? sanitize_text_field( $new_instance['email'] ) : '';

		return $instance;
	}

}

function register_top_information() {
	register_sidebar( array(
        'name' => __( 'Informacje w nagłówku', 'lingualab' ),
        'id' => 'top-info',
        'description' => __( 'W tym miejscu możliwa jest zmiana informacji w nagłówku', 'lingualab' ),
        'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_widget( 'TopInformations_Widget' );

}
add_action( 'widgets_init', 'register_top_information' );
?>
