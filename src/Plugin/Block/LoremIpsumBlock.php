<?php

namespace Drupal\loremipsum\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;


/**
 * @Block(
 *  id = "loremipsum_block",
 *  admin_label = @Translation("Lorem Ipsum block")
 * )
 */
class LoremIpsumBlock extends BlockBase
{
  public function build()
  {
    return \Drupal::formBuilder()->getForm('Drupal\loremipsum\Form\LoremIpsumBlockForm');
  }

  public function blockAccess(AccountInterface $account)
  {
    return AccessResult::allowedIfHasPermission($account, 'generate lorem ipsum');
  }

  public function blockForm($form, FormStateInterface $form_state)
  {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    return $form;
  }

  public function blockSubmit($form, FormStateInterface $form_state)
  {
    $this->setConfigurationValue('loremipsum_block_settings', $form_state->getValue('loremipsum_block_settings'));
  }
}
