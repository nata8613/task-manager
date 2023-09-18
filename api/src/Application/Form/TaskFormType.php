<?php

namespace App\Application\Form;

use App\Application\Controller\Request\CreateTaskRequest;
use App\Domain\Model\ValueObject\TaskStatus;
use App\Domain\Model\ValueObject\TaskType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class TaskFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'constraints' => [new NotNull()],
                'empty_data' => ''])
            ->add('description', null, [
                'required' => false,
                'empty_data' => null])
            ->add('dueDate', null, [
                'required' => false,
                'empty_data' => null])
            ->add('status', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    TaskStatus::TASK_STATUS_TODO,
                    TaskStatus::TASK_STATUS_IN_PROGRESS,
                    TaskStatus::TASK_STATUS_BLOCKED,
                    TaskStatus::TASK_STATUS_REVIEW,
                    TaskStatus::TASK_STATUS_COMPLETED,
                    TaskStatus::TASK_STATUS_CANCELED
                ]])
            ->add('priority', null, [
                'required' => false,
                'empty_data' => null])
            ->add('type', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    TaskType::TASK_TYPE_STORY,
                    TaskType::TASK_TYPE_TASK,
                    TaskType::TASK_TYPE_SPIKE,
                    TaskType::TASK_TYPE_BUG,
                    TaskType::TASK_TYPE_DESIGN,
                    TaskType::TASK_TYPE_IMPROVEMENT,
                    TaskType::TASK_TYPE_MAINTENANCE,
                    TaskType::TASK_TYPE_RESEARCH,
                    TaskType::TASK_TYPE_DOCUMENTATION
                ]])
            ->add('assignee', null, [
                'required' => false,
                'empty_data' => null])
            ->add('location', null, [
                'required' => false,
                'empty_data' => null])
            ->add('category', null, [
                'required' => false,
                'empty_data' => null])
            ->add('tags', null, [
                'required' => false,
                'empty_data' => null])
            ->add('estimatedTime', null, [
                'required' => false,
                'empty_data' => null])
            ->add('timeSpentOnTask', null, [
                'required' => false,
                'empty_data' => null])
            ->add('follow', null, [
                'required' => false,
                'empty_data' => null])
            ->add('unread', null, [
                'required' => false,
                'empty_data' => null]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreateTaskRequest::class,
            'csrf_protection' => false, // Disable CSRF for API endpoints
        ]);
    }
}