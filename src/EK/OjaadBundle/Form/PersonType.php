<?php

namespace EK\OjaadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class PersonType extends AbstractType {

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		/** @var \Symfony\Component\Translation\Translator $trans */
		$trans = $options['translator'];

		$builder
			->add('name', TextType::class , array(
				'label'        => $trans->trans('bform.input.name').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.name'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				)
			))
		->add('lastname', TextType::class , array(
				'label'        => $trans->trans('bform.input.lastname').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.lastname'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				)
			))
		->add('address', TextareaType::class , array(
				'label'        => $trans->trans('bform.input.address').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.placeholder.address'),
					'rows'        => '3',
					'cols'        => '500',
					'max_length'  => '200',
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				)
			))
		->add('email', EmailType::class , array(
				'label'        => $trans->trans('bform.input.email').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.email'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
					new Email(array("message"    => $trans->trans('bform.mail.error'))),
				),
			))
		->add('birthdate', DateTimeType::class , array(
				'label'             => $trans->trans('bform.input.birthdate').'*',
				'widget'            => 'single_text',
				'input'             => 'datetime',
				'format'            => 'yyyy-mm-dd',
				'attr'              => array(
					'placeholder'      => $trans->trans('bform.input.birthdate'),
					'class'            => 'form-control input-inline datepicker',
					'data-provide'     => 'datepicker',
					'data-date-format' => 'yyyy-mm-dd',
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('phone', TextType::class , array(
				'label'        => $trans->trans('bform.input.phone'),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.phone'),
				),
				'required' => false,
			))
			->add('prosituation', ChoiceType::class , array(
				'label'                                => $trans->trans('bform.input.prosituation').'*',
				'choices'                              => array(
					$trans->trans('bform.select.choice')  => '',
					$trans->trans('bform.prositu.anwser1')=> $trans->trans('bform.prositu.anwser1'),
					$trans->trans('bform.prositu.anwser2')=> $trans->trans('bform.prositu.anwser2'),
					$trans->trans('bform.prositu.anwser4')=> $trans->trans('bform.prositu.anwser4'),
					$trans->trans('bform.prositu.anwser5')=> $trans->trans('bform.prositu.anwser5'),
					$trans->trans('bform.prositu.anwser6')=> $trans->trans('bform.prositu.anwser6'),
					$trans->trans('bform.prositu.anwser7')=> $trans->trans('bform.prositu.anwser7'),
					$trans->trans('bform.prositu.anwser8')=> $trans->trans('bform.prositu.anwser8'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.prosituation'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('famsituation', ChoiceType::class , array(
				'label'                                => $trans->trans('bform.input.famsituation').'*',
				'choices'                              => array(
					$trans->trans('bform.select.choice')  => '',
					$trans->trans('bform.famsitu.anwser1')=> $trans->trans('bform.famsitu.anwser1'),
					$trans->trans('bform.famsitu.anwser2')=> $trans->trans('bform.famsitu.anwser2'),
					$trans->trans('bform.famsitu.anwser3')=> $trans->trans('bform.famsitu.anwser3'),
					$trans->trans('bform.famsitu.anwser4')=> $trans->trans('bform.famsitu.anwser4'),
					$trans->trans('bform.famsitu.anwser5')=> $trans->trans('bform.famsitu.anwser5'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.famsituation'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('nationality', CountryType::class , array(
				'label'        => $trans->trans('bform.input.nationality').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.nationality'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('nativecountry', CountryType::class , array(
				'label'        => $trans->trans('bform.input.nativecountry').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.nativecountry'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('question1', ChoiceType::class , array(
				'label'                              => $trans->trans('bform.input.question1').'*',
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.question1'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('question2', ChoiceType::class , array(
				'label'                              => $trans->trans('bform.input.question2').'*',
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.question2'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('question3', ChoiceType::class , array(
				'label'                              => $trans->trans('bform.input.question3').'*',
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.question3'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('question4', ChoiceType::class , array(
				'label'                              => $trans->trans('bform.input.question4'),
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.question4'),
				),
				'required' => false,
				/*'constraints' => array(
			new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
			),*/
			))
			->add('question5', TextareaType::class , array(
				'label'        => $trans->trans('bform.input.question5'),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.placeholder.question5'),
					'rows'        => 3,
					'cols'        => 500,
					'maxlength'   => 250,
				),
				'required' => false,
				/*'constraints'                 => array(
			new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
			new Length(array("min"       => 3, "max"       => 250, "maxMessage"       => $trans->trans('form.msg.error7'))),
			),*/
			))
			->add('question6', ChoiceType::class , array(
				'label'                              => $trans->trans('bform.input.question6').'*',
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.question6'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('question7', ChoiceType::class , array(
				'label'                              => $trans->trans('bform.input.question7'),
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.question7'),
				),
				'required' => false,
				/*'constraints' => array(
			new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
			),*/
			))
			->add('question8', ChoiceType::class , array(
				'label'                              => $trans->trans('bform.input.question8'),
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.question8'),
				),
				'required' => false,
				/*'constraints' => array(
			new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
			),*/
			))
			->add('question9', ChoiceType::class , array(
				'label'                              => $trans->trans('bform.input.question9').'*',
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.ques9.answer1')=> $trans->trans('bform.ques9.answer1'),
					$trans->trans('bform.ques9.answer2')=> $trans->trans('bform.ques9.answer2'),
					$trans->trans('bform.ques9.answer3')=> $trans->trans('bform.ques9.answer3'),
					$trans->trans('bform.ques9.answer4')=> $trans->trans('bform.ques9.answer4'),
					$trans->trans('bform.ques9.answer5')=> $trans->trans('bform.ques9.answer5'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.question9'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('question10', TextareaType::class , array(
				'label'        => $trans->trans('bform.input.question10').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.placeholder.question10'),
					'rows'        => 3,
					'cols'        => 500,
					'maxlength'   => 250,
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
					new Length(array("min"       => 3, "max"       => 250, "maxMessage"       => $trans->trans('form.msg.error7'))),
				),
			))
		->add('question11', TextareaType::class , array(
				'label'        => $trans->trans('bform.input.question11').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.placeholder.question11'),
					'rows'        => 3,
					'cols'        => 500,
					'maxlength'   => 250,
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))->add('adhesion', ChoiceType::class , array(
				'label'                              => $trans->trans('bform.input.adhesion').'*',
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.input.adhesion'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
					new Length(array("min"       => 3, "max"       => 250, "maxMessage"       => $trans->trans('form.msg.error7'))),
				),
			))
		->add('mensual', TextType::class , array(
				'label'        => $trans->trans('bform.input.mensual'),
				'attr'         => array(
					'placeholder' => $trans->trans('bform.placeholder.mensual'),
				),
				'required' => false,
			))
			->add('question12', TextareaType::class , array(
				'label'        => $trans->trans('bform.input.question12').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.placeholder.question12'),
					'rows'        => 3,
					'cols'        => 500,
					'maxlength'   => 250,
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
					new Length(array("min"       => 3, "max"       => 250, "maxMessage"       => $trans->trans('form.msg.error7'))),
				),
			));
	}

	/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setRequired('translator');
		$resolver->setDefaults(array(
				'data_class' => 'EK\OjaadBundle\Entity\Person',
			));
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function setDefaultOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
				'error_bubbling' => true
			));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix() {
		return 'ek_ojaadbundle_person';
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'person_form';
	}
}
