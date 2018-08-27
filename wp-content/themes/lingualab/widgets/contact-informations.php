<?php

class ContactInformations_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'contactinformations_widget', // Base ID
			esc_html__( 'Informacje w bloku kontaktowym', 'lingualab' ), // Name
			array( 'description' => esc_html__( 'Informacje w bloku kontaktowym', 'lingualab' ), ) // Args
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

		$titleBox = ! empty( $instance['titleBox'] ) ? trim($instance['titleBox']) : '';

		$i=1;
		for($i=1;$i<=3;$i++)
		{
			$head{$i} = ! empty( $instance['head'.$i] ) ? trim($instance['head'.$i]) : '';
			$contentBox{$i} = ! empty( $instance['contentBox'.$i] ) ? trim($instance['contentBox'.$i]) : '';
		}

		echo $args['before_widget'];

		echo '<span class="contactInfoTitle">' .$titleBox. '</span>';
		echo '<div class="contactInfoBoxWrapper">';
		$i=1;
		for($i=1;$i<=3;$i++)
		{
			if(strlen($head{$i})>0 || strlen($contentBox{$i})>0)
			{
				echo '<div class="contactInfoBoxItem">
						<span class="contactInfoBoxItemTitle">	' . $head{$i} . '</span>
						<div class="contactInfoBoxItemContent">
								' . $contentBox{$i} . '
						</div>
				</div>';
			}
		}

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
				$titleBox = ! empty( $instance['titleBox'] ) ? $instance['titleBox'] : '';
				$head1 = ! empty( $instance['head1'] ) ? $instance['head1'] : '';
				$head2 = ! empty( $instance['head2'] ) ? $instance['head2'] : '';
				$head3 = ! empty( $instance['head3'] ) ? $instance['head3'] : '';

        $contentBox1 = ! empty( $instance['contentBox1'] ) ? $instance['contentBox1'] : '';
				$contentBox2 = ! empty( $instance['contentBox2'] ) ? $instance['contentBox2'] : '';
				$contentBox3 = ! empty( $instance['contentBox3'] ) ? $instance['contentBox3'] : '';

		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'titleBox' ) ); ?>"><?php esc_attr_e( 'Tytuł boxu', 'lingualab' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'titleBox' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'titleBox' ) ); ?>" type="text" value="<?php echo esc_attr( $titleBox ); ?>">
		</p>


		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'head1' ) ); ?>"><?php esc_attr_e( 'Nagłówek 1', 'lingualab' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'head1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'head1' ) ); ?>" type="text" value="<?php echo esc_attr( $head1 ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'contentBox1' ) ); ?>"><?php esc_attr_e( 'Tekst 1', 'lingualab' ); ?></label>
		<textarea  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'contentBox1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contentBox1' ) ); ?>"><?php echo esc_attr( $contentBox1 ); ?></textarea>
		</p>


		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'head2' ) ); ?>"><?php esc_attr_e( 'Nagłówek 2', 'lingualab' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'head2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'head2' ) ); ?>" type="text" value="<?php echo esc_attr( $head2 ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'contentBox2' ) ); ?>"><?php esc_attr_e( 'Tekst 2', 'lingualab' ); ?></label>
		<textarea  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'contentBox2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contentBox2' ) ); ?>"><?php echo esc_attr( $contentBox2 ); ?></textarea>
		</p>



		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'head3' ) ); ?>"><?php esc_attr_e( 'Nagłówek 3', 'lingualab' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'head3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'head3' ) ); ?>" type="text" value="<?php echo esc_attr( $head3 ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'contentBox3' ) ); ?>"><?php esc_attr_e( 'Tekst 3', 'lingualab' ); ?></label>
		<textarea  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'contentBox3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'contentBox3' ) ); ?>"><?php echo esc_attr( $contentBox3 ); ?></textarea>
		</p>



		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();

			$instance['titleBox'] = ( ! empty( $new_instance['titleBox'] ) ) ? sanitize_text_field( $new_instance['titleBox'] ) : '';
			$instance['head1'] = ( ! empty( $new_instance['head1'] ) ) ? sanitize_text_field( $new_instance['head1'] ) : '';
			$instance['contentBox1'] = ( ! empty( $new_instance['contentBox1'] ) ) ? $new_instance['contentBox1']  : '';
			$instance['head2'] = ( ! empty( $new_instance['head2'] ) ) ? sanitize_text_field( $new_instance['head2'] ) : '';
			$instance['contentBox2'] = ( ! empty( $new_instance['contentBox2'] ) ) ? $new_instance['contentBox2']  : '';
			$instance['head3'] = ( ! empty( $new_instance['head3'] ) ) ? sanitize_text_field( $new_instance['head3'] ) : '';
			$instance['contentBox3'] = ( ! empty( $new_instance['contentBox3'] ) ) ? $new_instance['contentBox3']  : '';



		return $instance;
	}

}

function register_contact_information() {
	register_sidebar( array(
        'name' => __( 'Informacje w bloku kontaktowym', 'lingualab' ),
        'id' => 'contact-info',
        'description' => __( 'Informacje w bloku kontaktowym', 'lingualab' ),
        'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_widget( 'ContactInformations_Widget' );

}
add_action( 'widgets_init', 'register_contact_information' );
?>
