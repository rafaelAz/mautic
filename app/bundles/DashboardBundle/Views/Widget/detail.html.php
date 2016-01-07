<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<div class="card" style="height: <?php echo !empty($widget->getHeight()) ? ($widget->getHeight() - 10) . 'px' : '300px' ?>">
    <div class="card-header">
        <h4><?php echo $widget->getName(); ?></h4>
        <div class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-v"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a  href="<?php echo $this->container->get('router')->generate('mautic_dashboard_action', array('objectAction' => 'edit', 'objectId' => $widget->getId())); ?>" 
                        data-toggle="ajaxmodal" 
                        data-target="#MauticSharedModal" 
                        data-header="<?php echo $view['translator']->trans('mautic.dashboard.widget.header.edit'); ?>">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                </li>
                <li>
                    <a  href="<?php echo $this->container->get('router')->generate('mautic_dashboard_action', array('objectAction' => 'delete', 'objectId' => $widget->getId())); ?>" 
                        data-header="<?php echo $view['translator']->trans('mautic.dashboard.widget.header.delete'); ?>">
                        <i class="fa fa-remove"></i> Remove
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <?php if ($widget->getErrorMessage()) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $view['translator']->trans($widget->getErrorMessage()); ?>
            </div>
        <?php elseif ($widget->getTemplate()) : ?>
            <?php echo $view->render($widget->getTemplate(), $widget->getTemplateData()); ?>
        <?php endif; ?>
    </div>
</div>
