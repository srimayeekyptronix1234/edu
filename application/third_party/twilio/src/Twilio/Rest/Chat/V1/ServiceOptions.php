<?php

/** Company: Kyptronix LLP
Developer: Sandeep Kumar */

namespace Twilio\Rest\Chat\V1;

use Twilio\Options;
use Twilio\Values;

abstract class ServiceOptions {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $defaultServiceRoleSid The service role assigned to users when
     *                                      they are added to the service
     * @param string $defaultChannelRoleSid The channel role assigned to users when
     *                                      they are added to a channel
     * @param string $defaultChannelCreatorRoleSid The channel role assigned to a
     *                                             channel creator when they join a
     *                                             new channel
     * @param bool $readStatusEnabled Whether to enable the Message Consumption
     *                                Horizon feature
     * @param bool $reachabilityEnabled Whether to enable the Reachability
     *                                  Indicator feature for this Service instance
     * @param int $typingIndicatorTimeout How long in seconds to wait before
     *                                    assuming the user is no longer typing
     * @param int $consumptionReportInterval DEPRECATED
     * @param bool $notificationsNewMessageEnabled Whether to send a notification
     *                                             when a new message is added to a
     *                                             channel
     * @param string $notificationsNewMessageTemplate The template to use to create
     *                                                the notification text
     *                                                displayed when a new message
     *                                                is added to a channel
     * @param bool $notificationsAddedToChannelEnabled Whether to send a
     *                                                 notification when a member
     *                                                 is added to a channel
     * @param string $notificationsAddedToChannelTemplate The template to use to
     *                                                    create the notification
     *                                                    text displayed when a
     *                                                    member is added to a
     *                                                    channel
     * @param bool $notificationsRemovedFromChannelEnabled Whether to send a
     *                                                     notification to a user
     *                                                     when they are removed
     *                                                     from a channel
     * @param string $notificationsRemovedFromChannelTemplate The template to use
     *                                                        to create the
     *                                                        notification text
     *                                                        displayed to a user
     *                                                        when they are removed
     * @param bool $notificationsInvitedToChannelEnabled Whether to send a
     *                                                   notification when a user
     *                                                   is invited to a channel
     * @param string $notificationsInvitedToChannelTemplate The template to use to
     *                                                      create the notification
     *                                                      text displayed when a
     *                                                      user is invited to a
     *                                                      channel
     * @param string $preWebhookUrl The webhook URL for pre-event webhooks
     * @param string $postWebhookUrl The URL for post-event webhooks
     * @param string $webhookMethod The HTTP method  to use for both PRE and POST
     *                              webhooks
     * @param string $webhookFilters The list of WebHook events that are enabled
     *                               for this Service instance
     * @param string $webhooksOnMessageSendUrl The URL of the webhook to call in
     *                                         response to the on_message_send event
     * @param string $webhooksOnMessageSendMethod The HTTP method to use when
     *                                            calling the
     *                                            webhooks.on_message_send.url
     * @param string $webhooksOnMessageUpdateUrl The URL of the webhook to call in
     *                                           response to the on_message_update
     *                                           event
     * @param string $webhooksOnMessageUpdateMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_message_update.url
     * @param string $webhooksOnMessageRemoveUrl The URL of the webhook to call in
     *                                           response to the on_message_remove
     *                                           event
     * @param string $webhooksOnMessageRemoveMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_message_remove.url
     * @param string $webhooksOnChannelAddUrl The URL of the webhook to call in
     *                                        response to the on_channel_add event
     * @param string $webhooksOnChannelAddMethod The HTTP method to use when
     *                                           calling the
     *                                           webhooks.on_channel_add.url
     * @param string $webhooksOnChannelDestroyUrl The URL of the webhook to call in
     *                                            response to the
     *                                            on_channel_destroy event
     * @param string $webhooksOnChannelDestroyMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_channel_destroy.url
     * @param string $webhooksOnChannelUpdateUrl The URL of the webhook to call in
     *                                           response to the on_channel_update
     *                                           event
     * @param string $webhooksOnChannelUpdateMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_channel_update.url
     * @param string $webhooksOnMemberAddUrl The URL of the webhook to call in
     *                                       response to the on_member_add event
     * @param string $webhooksOnMemberAddMethod The HTTP method to use when calling
     *                                          the webhooks.on_member_add.url
     * @param string $webhooksOnMemberRemoveUrl The URL of the webhook to call in
     *                                          response to the on_member_remove
     *                                          event
     * @param string $webhooksOnMemberRemoveMethod The HTTP method to use when
     *                                             calling the
     *                                             webhooks.on_member_remove.url
     * @param string $webhooksOnMessageSentUrl The URL of the webhook to call in
     *                                         response to the on_message_sent event
     * @param string $webhooksOnMessageSentMethod The URL of the webhook to call in
     *                                            response to the on_message_sent
     *                                            event
     * @param string $webhooksOnMessageUpdatedUrl The URL of the webhook to call in
     *                                            response to the
     *                                            on_message_updated event
     * @param string $webhooksOnMessageUpdatedMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_message_updated.url
     * @param string $webhooksOnMessageRemovedUrl The URL of the webhook to call in
     *                                            response to the
     *                                            on_message_removed event
     * @param string $webhooksOnMessageRemovedMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_message_removed.url
     * @param string $webhooksOnChannelAddedUrl The URL of the webhook to call in
     *                                          response to the on_channel_added
     *                                          event
     * @param string $webhooksOnChannelAddedMethod The URL of the webhook to call
     *                                             in response to the
     *                                             on_channel_added event
     * @param string $webhooksOnChannelDestroyedUrl The URL of the webhook to call
     *                                              in response to the
     *                                              on_channel_added event
     * @param string $webhooksOnChannelDestroyedMethod The HTTP method to use when
     *                                                 calling the
     *                                                 webhooks.on_channel_destroyed.url
     * @param string $webhooksOnChannelUpdatedUrl he URL of the webhook to call in
     *                                            response to the
     *                                            on_channel_updated event
     * @param string $webhooksOnChannelUpdatedMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_channel_updated.url
     * @param string $webhooksOnMemberAddedUrl The URL of the webhook to call in
     *                                         response to the on_channel_updated
     *                                         event
     * @param string $webhooksOnMemberAddedMethod he HTTP method to use when
     *                                            calling the
     *                                            webhooks.on_channel_updated.url
     * @param string $webhooksOnMemberRemovedUrl The URL of the webhook to call in
     *                                           response to the on_member_removed
     *                                           event
     * @param string $webhooksOnMemberRemovedMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_member_removed.url
     * @param int $limitsChannelMembers The maximum number of Members that can be
     *                                  added to Channels within this Service
     * @param int $limitsUserChannels The maximum number of Channels Users can be a
     *                                Member of within this Service
     * @return UpdateServiceOptions Options builder
     */
    public static function update($friendlyName = Values::NONE, $defaultServiceRoleSid = Values::NONE, $defaultChannelRoleSid = Values::NONE, $defaultChannelCreatorRoleSid = Values::NONE, $readStatusEnabled = Values::NONE, $reachabilityEnabled = Values::NONE, $typingIndicatorTimeout = Values::NONE, $consumptionReportInterval = Values::NONE, $notificationsNewMessageEnabled = Values::NONE, $notificationsNewMessageTemplate = Values::NONE, $notificationsAddedToChannelEnabled = Values::NONE, $notificationsAddedToChannelTemplate = Values::NONE, $notificationsRemovedFromChannelEnabled = Values::NONE, $notificationsRemovedFromChannelTemplate = Values::NONE, $notificationsInvitedToChannelEnabled = Values::NONE, $notificationsInvitedToChannelTemplate = Values::NONE, $preWebhookUrl = Values::NONE, $postWebhookUrl = Values::NONE, $webhookMethod = Values::NONE, $webhookFilters = Values::NONE, $webhooksOnMessageSendUrl = Values::NONE, $webhooksOnMessageSendMethod = Values::NONE, $webhooksOnMessageUpdateUrl = Values::NONE, $webhooksOnMessageUpdateMethod = Values::NONE, $webhooksOnMessageRemoveUrl = Values::NONE, $webhooksOnMessageRemoveMethod = Values::NONE, $webhooksOnChannelAddUrl = Values::NONE, $webhooksOnChannelAddMethod = Values::NONE, $webhooksOnChannelDestroyUrl = Values::NONE, $webhooksOnChannelDestroyMethod = Values::NONE, $webhooksOnChannelUpdateUrl = Values::NONE, $webhooksOnChannelUpdateMethod = Values::NONE, $webhooksOnMemberAddUrl = Values::NONE, $webhooksOnMemberAddMethod = Values::NONE, $webhooksOnMemberRemoveUrl = Values::NONE, $webhooksOnMemberRemoveMethod = Values::NONE, $webhooksOnMessageSentUrl = Values::NONE, $webhooksOnMessageSentMethod = Values::NONE, $webhooksOnMessageUpdatedUrl = Values::NONE, $webhooksOnMessageUpdatedMethod = Values::NONE, $webhooksOnMessageRemovedUrl = Values::NONE, $webhooksOnMessageRemovedMethod = Values::NONE, $webhooksOnChannelAddedUrl = Values::NONE, $webhooksOnChannelAddedMethod = Values::NONE, $webhooksOnChannelDestroyedUrl = Values::NONE, $webhooksOnChannelDestroyedMethod = Values::NONE, $webhooksOnChannelUpdatedUrl = Values::NONE, $webhooksOnChannelUpdatedMethod = Values::NONE, $webhooksOnMemberAddedUrl = Values::NONE, $webhooksOnMemberAddedMethod = Values::NONE, $webhooksOnMemberRemovedUrl = Values::NONE, $webhooksOnMemberRemovedMethod = Values::NONE, $limitsChannelMembers = Values::NONE, $limitsUserChannels = Values::NONE) {
        return new UpdateServiceOptions($friendlyName, $defaultServiceRoleSid, $defaultChannelRoleSid, $defaultChannelCreatorRoleSid, $readStatusEnabled, $reachabilityEnabled, $typingIndicatorTimeout, $consumptionReportInterval, $notificationsNewMessageEnabled, $notificationsNewMessageTemplate, $notificationsAddedToChannelEnabled, $notificationsAddedToChannelTemplate, $notificationsRemovedFromChannelEnabled, $notificationsRemovedFromChannelTemplate, $notificationsInvitedToChannelEnabled, $notificationsInvitedToChannelTemplate, $preWebhookUrl, $postWebhookUrl, $webhookMethod, $webhookFilters, $webhooksOnMessageSendUrl, $webhooksOnMessageSendMethod, $webhooksOnMessageUpdateUrl, $webhooksOnMessageUpdateMethod, $webhooksOnMessageRemoveUrl, $webhooksOnMessageRemoveMethod, $webhooksOnChannelAddUrl, $webhooksOnChannelAddMethod, $webhooksOnChannelDestroyUrl, $webhooksOnChannelDestroyMethod, $webhooksOnChannelUpdateUrl, $webhooksOnChannelUpdateMethod, $webhooksOnMemberAddUrl, $webhooksOnMemberAddMethod, $webhooksOnMemberRemoveUrl, $webhooksOnMemberRemoveMethod, $webhooksOnMessageSentUrl, $webhooksOnMessageSentMethod, $webhooksOnMessageUpdatedUrl, $webhooksOnMessageUpdatedMethod, $webhooksOnMessageRemovedUrl, $webhooksOnMessageRemovedMethod, $webhooksOnChannelAddedUrl, $webhooksOnChannelAddedMethod, $webhooksOnChannelDestroyedUrl, $webhooksOnChannelDestroyedMethod, $webhooksOnChannelUpdatedUrl, $webhooksOnChannelUpdatedMethod, $webhooksOnMemberAddedUrl, $webhooksOnMemberAddedMethod, $webhooksOnMemberRemovedUrl, $webhooksOnMemberRemovedMethod, $limitsChannelMembers, $limitsUserChannels);
    }
}

class UpdateServiceOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     * @param string $defaultServiceRoleSid The service role assigned to users when
     *                                      they are added to the service
     * @param string $defaultChannelRoleSid The channel role assigned to users when
     *                                      they are added to a channel
     * @param string $defaultChannelCreatorRoleSid The channel role assigned to a
     *                                             channel creator when they join a
     *                                             new channel
     * @param bool $readStatusEnabled Whether to enable the Message Consumption
     *                                Horizon feature
     * @param bool $reachabilityEnabled Whether to enable the Reachability
     *                                  Indicator feature for this Service instance
     * @param int $typingIndicatorTimeout How long in seconds to wait before
     *                                    assuming the user is no longer typing
     * @param int $consumptionReportInterval DEPRECATED
     * @param bool $notificationsNewMessageEnabled Whether to send a notification
     *                                             when a new message is added to a
     *                                             channel
     * @param string $notificationsNewMessageTemplate The template to use to create
     *                                                the notification text
     *                                                displayed when a new message
     *                                                is added to a channel
     * @param bool $notificationsAddedToChannelEnabled Whether to send a
     *                                                 notification when a member
     *                                                 is added to a channel
     * @param string $notificationsAddedToChannelTemplate The template to use to
     *                                                    create the notification
     *                                                    text displayed when a
     *                                                    member is added to a
     *                                                    channel
     * @param bool $notificationsRemovedFromChannelEnabled Whether to send a
     *                                                     notification to a user
     *                                                     when they are removed
     *                                                     from a channel
     * @param string $notificationsRemovedFromChannelTemplate The template to use
     *                                                        to create the
     *                                                        notification text
     *                                                        displayed to a user
     *                                                        when they are removed
     * @param bool $notificationsInvitedToChannelEnabled Whether to send a
     *                                                   notification when a user
     *                                                   is invited to a channel
     * @param string $notificationsInvitedToChannelTemplate The template to use to
     *                                                      create the notification
     *                                                      text displayed when a
     *                                                      user is invited to a
     *                                                      channel
     * @param string $preWebhookUrl The webhook URL for pre-event webhooks
     * @param string $postWebhookUrl The URL for post-event webhooks
     * @param string $webhookMethod The HTTP method  to use for both PRE and POST
     *                              webhooks
     * @param string $webhookFilters The list of WebHook events that are enabled
     *                               for this Service instance
     * @param string $webhooksOnMessageSendUrl The URL of the webhook to call in
     *                                         response to the on_message_send event
     * @param string $webhooksOnMessageSendMethod The HTTP method to use when
     *                                            calling the
     *                                            webhooks.on_message_send.url
     * @param string $webhooksOnMessageUpdateUrl The URL of the webhook to call in
     *                                           response to the on_message_update
     *                                           event
     * @param string $webhooksOnMessageUpdateMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_message_update.url
     * @param string $webhooksOnMessageRemoveUrl The URL of the webhook to call in
     *                                           response to the on_message_remove
     *                                           event
     * @param string $webhooksOnMessageRemoveMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_message_remove.url
     * @param string $webhooksOnChannelAddUrl The URL of the webhook to call in
     *                                        response to the on_channel_add event
     * @param string $webhooksOnChannelAddMethod The HTTP method to use when
     *                                           calling the
     *                                           webhooks.on_channel_add.url
     * @param string $webhooksOnChannelDestroyUrl The URL of the webhook to call in
     *                                            response to the
     *                                            on_channel_destroy event
     * @param string $webhooksOnChannelDestroyMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_channel_destroy.url
     * @param string $webhooksOnChannelUpdateUrl The URL of the webhook to call in
     *                                           response to the on_channel_update
     *                                           event
     * @param string $webhooksOnChannelUpdateMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_channel_update.url
     * @param string $webhooksOnMemberAddUrl The URL of the webhook to call in
     *                                       response to the on_member_add event
     * @param string $webhooksOnMemberAddMethod The HTTP method to use when calling
     *                                          the webhooks.on_member_add.url
     * @param string $webhooksOnMemberRemoveUrl The URL of the webhook to call in
     *                                          response to the on_member_remove
     *                                          event
     * @param string $webhooksOnMemberRemoveMethod The HTTP method to use when
     *                                             calling the
     *                                             webhooks.on_member_remove.url
     * @param string $webhooksOnMessageSentUrl The URL of the webhook to call in
     *                                         response to the on_message_sent event
     * @param string $webhooksOnMessageSentMethod The URL of the webhook to call in
     *                                            response to the on_message_sent
     *                                            event
     * @param string $webhooksOnMessageUpdatedUrl The URL of the webhook to call in
     *                                            response to the
     *                                            on_message_updated event
     * @param string $webhooksOnMessageUpdatedMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_message_updated.url
     * @param string $webhooksOnMessageRemovedUrl The URL of the webhook to call in
     *                                            response to the
     *                                            on_message_removed event
     * @param string $webhooksOnMessageRemovedMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_message_removed.url
     * @param string $webhooksOnChannelAddedUrl The URL of the webhook to call in
     *                                          response to the on_channel_added
     *                                          event
     * @param string $webhooksOnChannelAddedMethod The URL of the webhook to call
     *                                             in response to the
     *                                             on_channel_added event
     * @param string $webhooksOnChannelDestroyedUrl The URL of the webhook to call
     *                                              in response to the
     *                                              on_channel_added event
     * @param string $webhooksOnChannelDestroyedMethod The HTTP method to use when
     *                                                 calling the
     *                                                 webhooks.on_channel_destroyed.url
     * @param string $webhooksOnChannelUpdatedUrl he URL of the webhook to call in
     *                                            response to the
     *                                            on_channel_updated event
     * @param string $webhooksOnChannelUpdatedMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_channel_updated.url
     * @param string $webhooksOnMemberAddedUrl The URL of the webhook to call in
     *                                         response to the on_channel_updated
     *                                         event
     * @param string $webhooksOnMemberAddedMethod he HTTP method to use when
     *                                            calling the
     *                                            webhooks.on_channel_updated.url
     * @param string $webhooksOnMemberRemovedUrl The URL of the webhook to call in
     *                                           response to the on_member_removed
     *                                           event
     * @param string $webhooksOnMemberRemovedMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_member_removed.url
     * @param int $limitsChannelMembers The maximum number of Members that can be
     *                                  added to Channels within this Service
     * @param int $limitsUserChannels The maximum number of Channels Users can be a
     *                                Member of within this Service
     */
    public function __construct($friendlyName = Values::NONE, $defaultServiceRoleSid = Values::NONE, $defaultChannelRoleSid = Values::NONE, $defaultChannelCreatorRoleSid = Values::NONE, $readStatusEnabled = Values::NONE, $reachabilityEnabled = Values::NONE, $typingIndicatorTimeout = Values::NONE, $consumptionReportInterval = Values::NONE, $notificationsNewMessageEnabled = Values::NONE, $notificationsNewMessageTemplate = Values::NONE, $notificationsAddedToChannelEnabled = Values::NONE, $notificationsAddedToChannelTemplate = Values::NONE, $notificationsRemovedFromChannelEnabled = Values::NONE, $notificationsRemovedFromChannelTemplate = Values::NONE, $notificationsInvitedToChannelEnabled = Values::NONE, $notificationsInvitedToChannelTemplate = Values::NONE, $preWebhookUrl = Values::NONE, $postWebhookUrl = Values::NONE, $webhookMethod = Values::NONE, $webhookFilters = Values::NONE, $webhooksOnMessageSendUrl = Values::NONE, $webhooksOnMessageSendMethod = Values::NONE, $webhooksOnMessageUpdateUrl = Values::NONE, $webhooksOnMessageUpdateMethod = Values::NONE, $webhooksOnMessageRemoveUrl = Values::NONE, $webhooksOnMessageRemoveMethod = Values::NONE, $webhooksOnChannelAddUrl = Values::NONE, $webhooksOnChannelAddMethod = Values::NONE, $webhooksOnChannelDestroyUrl = Values::NONE, $webhooksOnChannelDestroyMethod = Values::NONE, $webhooksOnChannelUpdateUrl = Values::NONE, $webhooksOnChannelUpdateMethod = Values::NONE, $webhooksOnMemberAddUrl = Values::NONE, $webhooksOnMemberAddMethod = Values::NONE, $webhooksOnMemberRemoveUrl = Values::NONE, $webhooksOnMemberRemoveMethod = Values::NONE, $webhooksOnMessageSentUrl = Values::NONE, $webhooksOnMessageSentMethod = Values::NONE, $webhooksOnMessageUpdatedUrl = Values::NONE, $webhooksOnMessageUpdatedMethod = Values::NONE, $webhooksOnMessageRemovedUrl = Values::NONE, $webhooksOnMessageRemovedMethod = Values::NONE, $webhooksOnChannelAddedUrl = Values::NONE, $webhooksOnChannelAddedMethod = Values::NONE, $webhooksOnChannelDestroyedUrl = Values::NONE, $webhooksOnChannelDestroyedMethod = Values::NONE, $webhooksOnChannelUpdatedUrl = Values::NONE, $webhooksOnChannelUpdatedMethod = Values::NONE, $webhooksOnMemberAddedUrl = Values::NONE, $webhooksOnMemberAddedMethod = Values::NONE, $webhooksOnMemberRemovedUrl = Values::NONE, $webhooksOnMemberRemovedMethod = Values::NONE, $limitsChannelMembers = Values::NONE, $limitsUserChannels = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['defaultServiceRoleSid'] = $defaultServiceRoleSid;
        $this->options['defaultChannelRoleSid'] = $defaultChannelRoleSid;
        $this->options['defaultChannelCreatorRoleSid'] = $defaultChannelCreatorRoleSid;
        $this->options['readStatusEnabled'] = $readStatusEnabled;
        $this->options['reachabilityEnabled'] = $reachabilityEnabled;
        $this->options['typingIndicatorTimeout'] = $typingIndicatorTimeout;
        $this->options['consumptionReportInterval'] = $consumptionReportInterval;
        $this->options['notificationsNewMessageEnabled'] = $notificationsNewMessageEnabled;
        $this->options['notificationsNewMessageTemplate'] = $notificationsNewMessageTemplate;
        $this->options['notificationsAddedToChannelEnabled'] = $notificationsAddedToChannelEnabled;
        $this->options['notificationsAddedToChannelTemplate'] = $notificationsAddedToChannelTemplate;
        $this->options['notificationsRemovedFromChannelEnabled'] = $notificationsRemovedFromChannelEnabled;
        $this->options['notificationsRemovedFromChannelTemplate'] = $notificationsRemovedFromChannelTemplate;
        $this->options['notificationsInvitedToChannelEnabled'] = $notificationsInvitedToChannelEnabled;
        $this->options['notificationsInvitedToChannelTemplate'] = $notificationsInvitedToChannelTemplate;
        $this->options['preWebhookUrl'] = $preWebhookUrl;
        $this->options['postWebhookUrl'] = $postWebhookUrl;
        $this->options['webhookMethod'] = $webhookMethod;
        $this->options['webhookFilters'] = $webhookFilters;
        $this->options['webhooksOnMessageSendUrl'] = $webhooksOnMessageSendUrl;
        $this->options['webhooksOnMessageSendMethod'] = $webhooksOnMessageSendMethod;
        $this->options['webhooksOnMessageUpdateUrl'] = $webhooksOnMessageUpdateUrl;
        $this->options['webhooksOnMessageUpdateMethod'] = $webhooksOnMessageUpdateMethod;
        $this->options['webhooksOnMessageRemoveUrl'] = $webhooksOnMessageRemoveUrl;
        $this->options['webhooksOnMessageRemoveMethod'] = $webhooksOnMessageRemoveMethod;
        $this->options['webhooksOnChannelAddUrl'] = $webhooksOnChannelAddUrl;
        $this->options['webhooksOnChannelAddMethod'] = $webhooksOnChannelAddMethod;
        $this->options['webhooksOnChannelDestroyUrl'] = $webhooksOnChannelDestroyUrl;
        $this->options['webhooksOnChannelDestroyMethod'] = $webhooksOnChannelDestroyMethod;
        $this->options['webhooksOnChannelUpdateUrl'] = $webhooksOnChannelUpdateUrl;
        $this->options['webhooksOnChannelUpdateMethod'] = $webhooksOnChannelUpdateMethod;
        $this->options['webhooksOnMemberAddUrl'] = $webhooksOnMemberAddUrl;
        $this->options['webhooksOnMemberAddMethod'] = $webhooksOnMemberAddMethod;
        $this->options['webhooksOnMemberRemoveUrl'] = $webhooksOnMemberRemoveUrl;
        $this->options['webhooksOnMemberRemoveMethod'] = $webhooksOnMemberRemoveMethod;
        $this->options['webhooksOnMessageSentUrl'] = $webhooksOnMessageSentUrl;
        $this->options['webhooksOnMessageSentMethod'] = $webhooksOnMessageSentMethod;
        $this->options['webhooksOnMessageUpdatedUrl'] = $webhooksOnMessageUpdatedUrl;
        $this->options['webhooksOnMessageUpdatedMethod'] = $webhooksOnMessageUpdatedMethod;
        $this->options['webhooksOnMessageRemovedUrl'] = $webhooksOnMessageRemovedUrl;
        $this->options['webhooksOnMessageRemovedMethod'] = $webhooksOnMessageRemovedMethod;
        $this->options['webhooksOnChannelAddedUrl'] = $webhooksOnChannelAddedUrl;
        $this->options['webhooksOnChannelAddedMethod'] = $webhooksOnChannelAddedMethod;
        $this->options['webhooksOnChannelDestroyedUrl'] = $webhooksOnChannelDestroyedUrl;
        $this->options['webhooksOnChannelDestroyedMethod'] = $webhooksOnChannelDestroyedMethod;
        $this->options['webhooksOnChannelUpdatedUrl'] = $webhooksOnChannelUpdatedUrl;
        $this->options['webhooksOnChannelUpdatedMethod'] = $webhooksOnChannelUpdatedMethod;
        $this->options['webhooksOnMemberAddedUrl'] = $webhooksOnMemberAddedUrl;
        $this->options['webhooksOnMemberAddedMethod'] = $webhooksOnMemberAddedMethod;
        $this->options['webhooksOnMemberRemovedUrl'] = $webhooksOnMemberRemovedUrl;
        $this->options['webhooksOnMemberRemovedMethod'] = $webhooksOnMemberRemovedMethod;
        $this->options['limitsChannelMembers'] = $limitsChannelMembers;
        $this->options['limitsUserChannels'] = $limitsUserChannels;
    }

    /**
     * A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName) {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * The service role assigned to users when they are added to the service. See the [Roles endpoint](https://www.twilio.com/docs/chat/api/roles) for more details.
     *
     * @param string $defaultServiceRoleSid The service role assigned to users when
     *                                      they are added to the service
     * @return $this Fluent Builder
     */
    public function setDefaultServiceRoleSid($defaultServiceRoleSid) {
        $this->options['defaultServiceRoleSid'] = $defaultServiceRoleSid;
        return $this;
    }

    /**
     * The channel role assigned to users when they are added to a channel. See the [Roles endpoint](https://www.twilio.com/docs/chat/api/roles) for more details.
     *
     * @param string $defaultChannelRoleSid The channel role assigned to users when
     *                                      they are added to a channel
     * @return $this Fluent Builder
     */
    public function setDefaultChannelRoleSid($defaultChannelRoleSid) {
        $this->options['defaultChannelRoleSid'] = $defaultChannelRoleSid;
        return $this;
    }

    /**
     * The channel role assigned to a channel creator when they join a new channel. See the [Roles endpoint](https://www.twilio.com/docs/chat/api/roles) for more details.
     *
     * @param string $defaultChannelCreatorRoleSid The channel role assigned to a
     *                                             channel creator when they join a
     *                                             new channel
     * @return $this Fluent Builder
     */
    public function setDefaultChannelCreatorRoleSid($defaultChannelCreatorRoleSid) {
        $this->options['defaultChannelCreatorRoleSid'] = $defaultChannelCreatorRoleSid;
        return $this;
    }

    /**
     * Whether to enable the [Message Consumption Horizon](https://www.twilio.com/docs/chat/consumption-horizon) feature. The default is `true`.
     *
     * @param bool $readStatusEnabled Whether to enable the Message Consumption
     *                                Horizon feature
     * @return $this Fluent Builder
     */
    public function setReadStatusEnabled($readStatusEnabled) {
        $this->options['readStatusEnabled'] = $readStatusEnabled;
        return $this;
    }

    /**
     * Whether to enable the [Reachability Indicator](https://www.twilio.com/docs/chat/reachability-indicator) for this Service instance. The default is `false`.
     *
     * @param bool $reachabilityEnabled Whether to enable the Reachability
     *                                  Indicator feature for this Service instance
     * @return $this Fluent Builder
     */
    public function setReachabilityEnabled($reachabilityEnabled) {
        $this->options['reachabilityEnabled'] = $reachabilityEnabled;
        return $this;
    }

    /**
     * How long in seconds after a `started typing` event until clients should assume that user is no longer typing, even if no `ended typing` message was received.  The default is 5 seconds.
     *
     * @param int $typingIndicatorTimeout How long in seconds to wait before
     *                                    assuming the user is no longer typing
     * @return $this Fluent Builder
     */
    public function setTypingIndicatorTimeout($typingIndicatorTimeout) {
        $this->options['typingIndicatorTimeout'] = $typingIndicatorTimeout;
        return $this;
    }

    /**
     * DEPRECATED. The interval in seconds between consumption reports submission batches from client endpoints.
     *
     * @param int $consumptionReportInterval DEPRECATED
     * @return $this Fluent Builder
     */
    public function setConsumptionReportInterval($consumptionReportInterval) {
        $this->options['consumptionReportInterval'] = $consumptionReportInterval;
        return $this;
    }

    /**
     * Whether to send a notification when a new message is added to a channel. Can be: `true` or `false` and the default is `false`.
     *
     * @param bool $notificationsNewMessageEnabled Whether to send a notification
     *                                             when a new message is added to a
     *                                             channel
     * @return $this Fluent Builder
     */
    public function setNotificationsNewMessageEnabled($notificationsNewMessageEnabled) {
        $this->options['notificationsNewMessageEnabled'] = $notificationsNewMessageEnabled;
        return $this;
    }

    /**
     * The template to use to create the notification text displayed when a new message is added to a channel and `notifications.new_message.enabled` is `true`.
     *
     * @param string $notificationsNewMessageTemplate The template to use to create
     *                                                the notification text
     *                                                displayed when a new message
     *                                                is added to a channel
     * @return $this Fluent Builder
     */
    public function setNotificationsNewMessageTemplate($notificationsNewMessageTemplate) {
        $this->options['notificationsNewMessageTemplate'] = $notificationsNewMessageTemplate;
        return $this;
    }

    /**
     * Whether to send a notification when a member is added to a channel. Can be: `true` or `false` and the default is `false`.
     *
     * @param bool $notificationsAddedToChannelEnabled Whether to send a
     *                                                 notification when a member
     *                                                 is added to a channel
     * @return $this Fluent Builder
     */
    public function setNotificationsAddedToChannelEnabled($notificationsAddedToChannelEnabled) {
        $this->options['notificationsAddedToChannelEnabled'] = $notificationsAddedToChannelEnabled;
        return $this;
    }

    /**
     * The template to use to create the notification text displayed when a member is added to a channel and `notifications.added_to_channel.enabled` is `true`.
     *
     * @param string $notificationsAddedToChannelTemplate The template to use to
     *                                                    create the notification
     *                                                    text displayed when a
     *                                                    member is added to a
     *                                                    channel
     * @return $this Fluent Builder
     */
    public function setNotificationsAddedToChannelTemplate($notificationsAddedToChannelTemplate) {
        $this->options['notificationsAddedToChannelTemplate'] = $notificationsAddedToChannelTemplate;
        return $this;
    }

    /**
     * Whether to send a notification to a user when they are removed from a channel. Can be: `true` or `false` and the default is `false`.
     *
     * @param bool $notificationsRemovedFromChannelEnabled Whether to send a
     *                                                     notification to a user
     *                                                     when they are removed
     *                                                     from a channel
     * @return $this Fluent Builder
     */
    public function setNotificationsRemovedFromChannelEnabled($notificationsRemovedFromChannelEnabled) {
        $this->options['notificationsRemovedFromChannelEnabled'] = $notificationsRemovedFromChannelEnabled;
        return $this;
    }

    /**
     * The template to use to create the notification text displayed to a user when they are removed from a channel and `notifications.removed_from_channel.enabled` is `true`.
     *
     * @param string $notificationsRemovedFromChannelTemplate The template to use
     *                                                        to create the
     *                                                        notification text
     *                                                        displayed to a user
     *                                                        when they are removed
     * @return $this Fluent Builder
     */
    public function setNotificationsRemovedFromChannelTemplate($notificationsRemovedFromChannelTemplate) {
        $this->options['notificationsRemovedFromChannelTemplate'] = $notificationsRemovedFromChannelTemplate;
        return $this;
    }

    /**
     * Whether to send a notification when a user is invited to a channel. Can be: `true` or `false` and the default is `false`.
     *
     * @param bool $notificationsInvitedToChannelEnabled Whether to send a
     *                                                   notification when a user
     *                                                   is invited to a channel
     * @return $this Fluent Builder
     */
    public function setNotificationsInvitedToChannelEnabled($notificationsInvitedToChannelEnabled) {
        $this->options['notificationsInvitedToChannelEnabled'] = $notificationsInvitedToChannelEnabled;
        return $this;
    }

    /**
     * The template to use to create the notification text displayed when a user is invited to a channel and `notifications.invited_to_channel.enabled` is `true`.
     *
     * @param string $notificationsInvitedToChannelTemplate The template to use to
     *                                                      create the notification
     *                                                      text displayed when a
     *                                                      user is invited to a
     *                                                      channel
     * @return $this Fluent Builder
     */
    public function setNotificationsInvitedToChannelTemplate($notificationsInvitedToChannelTemplate) {
        $this->options['notificationsInvitedToChannelTemplate'] = $notificationsInvitedToChannelTemplate;
        return $this;
    }

    /**
     * The URL for pre-event webhooks, which are called by using the `webhook_method`. See [Webhook Events](https://www.twilio.com/docs/api/chat/webhooks) for more details.
     *
     * @param string $preWebhookUrl The webhook URL for pre-event webhooks
     * @return $this Fluent Builder
     */
    public function setPreWebhookUrl($preWebhookUrl) {
        $this->options['preWebhookUrl'] = $preWebhookUrl;
        return $this;
    }

    /**
     * The URL for post-event webhooks, which are called by using the `webhook_method`. See [Webhook Events](https://www.twilio.com/docs/api/chat/webhooks) for more details.
     *
     * @param string $postWebhookUrl The URL for post-event webhooks
     * @return $this Fluent Builder
     */
    public function setPostWebhookUrl($postWebhookUrl) {
        $this->options['postWebhookUrl'] = $postWebhookUrl;
        return $this;
    }

    /**
     * The HTTP method to use for calls to the `pre_webhook_url` and `post_webhook_url` webhooks.  Can be: `POST` or `GET` and the default is `POST`. See [Webhook Events](https://www.twilio.com/docs/chat/webhook-events) for more details.
     *
     * @param string $webhookMethod The HTTP method  to use for both PRE and POST
     *                              webhooks
     * @return $this Fluent Builder
     */
    public function setWebhookMethod($webhookMethod) {
        $this->options['webhookMethod'] = $webhookMethod;
        return $this;
    }

    /**
     * The list of WebHook events that are enabled for this Service instance. See [Webhook Events](https://www.twilio.com/docs/chat/webhook-events) for more details.
     *
     * @param string $webhookFilters The list of WebHook events that are enabled
     *                               for this Service instance
     * @return $this Fluent Builder
     */
    public function setWebhookFilters($webhookFilters) {
        $this->options['webhookFilters'] = $webhookFilters;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_message_send` event using the `webhooks.on_message_send.method` HTTP method.
     *
     * @param string $webhooksOnMessageSendUrl The URL of the webhook to call in
     *                                         response to the on_message_send event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageSendUrl($webhooksOnMessageSendUrl) {
        $this->options['webhooksOnMessageSendUrl'] = $webhooksOnMessageSendUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_message_send.url`.
     *
     * @param string $webhooksOnMessageSendMethod The HTTP method to use when
     *                                            calling the
     *                                            webhooks.on_message_send.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageSendMethod($webhooksOnMessageSendMethod) {
        $this->options['webhooksOnMessageSendMethod'] = $webhooksOnMessageSendMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_message_update` event using the `webhooks.on_message_update.method` HTTP method.
     *
     * @param string $webhooksOnMessageUpdateUrl The URL of the webhook to call in
     *                                           response to the on_message_update
     *                                           event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageUpdateUrl($webhooksOnMessageUpdateUrl) {
        $this->options['webhooksOnMessageUpdateUrl'] = $webhooksOnMessageUpdateUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_message_update.url`.
     *
     * @param string $webhooksOnMessageUpdateMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_message_update.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageUpdateMethod($webhooksOnMessageUpdateMethod) {
        $this->options['webhooksOnMessageUpdateMethod'] = $webhooksOnMessageUpdateMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_message_remove` event using the `webhooks.on_message_remove.method` HTTP method.
     *
     * @param string $webhooksOnMessageRemoveUrl The URL of the webhook to call in
     *                                           response to the on_message_remove
     *                                           event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageRemoveUrl($webhooksOnMessageRemoveUrl) {
        $this->options['webhooksOnMessageRemoveUrl'] = $webhooksOnMessageRemoveUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_message_remove.url`.
     *
     * @param string $webhooksOnMessageRemoveMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_message_remove.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageRemoveMethod($webhooksOnMessageRemoveMethod) {
        $this->options['webhooksOnMessageRemoveMethod'] = $webhooksOnMessageRemoveMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_channel_add` event using the `webhooks.on_channel_add.method` HTTP method.
     *
     * @param string $webhooksOnChannelAddUrl The URL of the webhook to call in
     *                                        response to the on_channel_add event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelAddUrl($webhooksOnChannelAddUrl) {
        $this->options['webhooksOnChannelAddUrl'] = $webhooksOnChannelAddUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_channel_add.url`.
     *
     * @param string $webhooksOnChannelAddMethod The HTTP method to use when
     *                                           calling the
     *                                           webhooks.on_channel_add.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelAddMethod($webhooksOnChannelAddMethod) {
        $this->options['webhooksOnChannelAddMethod'] = $webhooksOnChannelAddMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_channel_destroy` event using the `webhooks.on_channel_destroy.method` HTTP method.
     *
     * @param string $webhooksOnChannelDestroyUrl The URL of the webhook to call in
     *                                            response to the
     *                                            on_channel_destroy event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelDestroyUrl($webhooksOnChannelDestroyUrl) {
        $this->options['webhooksOnChannelDestroyUrl'] = $webhooksOnChannelDestroyUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_channel_destroy.url`.
     *
     * @param string $webhooksOnChannelDestroyMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_channel_destroy.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelDestroyMethod($webhooksOnChannelDestroyMethod) {
        $this->options['webhooksOnChannelDestroyMethod'] = $webhooksOnChannelDestroyMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_channel_update` event using the `webhooks.on_channel_update.method` HTTP method.
     *
     * @param string $webhooksOnChannelUpdateUrl The URL of the webhook to call in
     *                                           response to the on_channel_update
     *                                           event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelUpdateUrl($webhooksOnChannelUpdateUrl) {
        $this->options['webhooksOnChannelUpdateUrl'] = $webhooksOnChannelUpdateUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_channel_update.url`.
     *
     * @param string $webhooksOnChannelUpdateMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_channel_update.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelUpdateMethod($webhooksOnChannelUpdateMethod) {
        $this->options['webhooksOnChannelUpdateMethod'] = $webhooksOnChannelUpdateMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_member_add` event using the `webhooks.on_member_add.method` HTTP method.
     *
     * @param string $webhooksOnMemberAddUrl The URL of the webhook to call in
     *                                       response to the on_member_add event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMemberAddUrl($webhooksOnMemberAddUrl) {
        $this->options['webhooksOnMemberAddUrl'] = $webhooksOnMemberAddUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_member_add.url`.
     *
     * @param string $webhooksOnMemberAddMethod The HTTP method to use when calling
     *                                          the webhooks.on_member_add.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMemberAddMethod($webhooksOnMemberAddMethod) {
        $this->options['webhooksOnMemberAddMethod'] = $webhooksOnMemberAddMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_member_remove` event using the `webhooks.on_member_remove.method` HTTP method.
     *
     * @param string $webhooksOnMemberRemoveUrl The URL of the webhook to call in
     *                                          response to the on_member_remove
     *                                          event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMemberRemoveUrl($webhooksOnMemberRemoveUrl) {
        $this->options['webhooksOnMemberRemoveUrl'] = $webhooksOnMemberRemoveUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_member_remove.url`.
     *
     * @param string $webhooksOnMemberRemoveMethod The HTTP method to use when
     *                                             calling the
     *                                             webhooks.on_member_remove.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMemberRemoveMethod($webhooksOnMemberRemoveMethod) {
        $this->options['webhooksOnMemberRemoveMethod'] = $webhooksOnMemberRemoveMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_message_sent` event using the `webhooks.on_message_sent.method` HTTP method.
     *
     * @param string $webhooksOnMessageSentUrl The URL of the webhook to call in
     *                                         response to the on_message_sent event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageSentUrl($webhooksOnMessageSentUrl) {
        $this->options['webhooksOnMessageSentUrl'] = $webhooksOnMessageSentUrl;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_message_sent` event`.
     *
     * @param string $webhooksOnMessageSentMethod The URL of the webhook to call in
     *                                            response to the on_message_sent
     *                                            event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageSentMethod($webhooksOnMessageSentMethod) {
        $this->options['webhooksOnMessageSentMethod'] = $webhooksOnMessageSentMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_message_updated` event using the `webhooks.on_message_updated.method` HTTP method.
     *
     * @param string $webhooksOnMessageUpdatedUrl The URL of the webhook to call in
     *                                            response to the
     *                                            on_message_updated event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageUpdatedUrl($webhooksOnMessageUpdatedUrl) {
        $this->options['webhooksOnMessageUpdatedUrl'] = $webhooksOnMessageUpdatedUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_message_updated.url`.
     *
     * @param string $webhooksOnMessageUpdatedMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_message_updated.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageUpdatedMethod($webhooksOnMessageUpdatedMethod) {
        $this->options['webhooksOnMessageUpdatedMethod'] = $webhooksOnMessageUpdatedMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_message_removed` event using the `webhooks.on_message_removed.method` HTTP method.
     *
     * @param string $webhooksOnMessageRemovedUrl The URL of the webhook to call in
     *                                            response to the
     *                                            on_message_removed event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageRemovedUrl($webhooksOnMessageRemovedUrl) {
        $this->options['webhooksOnMessageRemovedUrl'] = $webhooksOnMessageRemovedUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_message_removed.url`.
     *
     * @param string $webhooksOnMessageRemovedMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_message_removed.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMessageRemovedMethod($webhooksOnMessageRemovedMethod) {
        $this->options['webhooksOnMessageRemovedMethod'] = $webhooksOnMessageRemovedMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_channel_added` event using the `webhooks.on_channel_added.method` HTTP method.
     *
     * @param string $webhooksOnChannelAddedUrl The URL of the webhook to call in
     *                                          response to the on_channel_added
     *                                          event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelAddedUrl($webhooksOnChannelAddedUrl) {
        $this->options['webhooksOnChannelAddedUrl'] = $webhooksOnChannelAddedUrl;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_channel_added` event`.
     *
     * @param string $webhooksOnChannelAddedMethod The URL of the webhook to call
     *                                             in response to the
     *                                             on_channel_added event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelAddedMethod($webhooksOnChannelAddedMethod) {
        $this->options['webhooksOnChannelAddedMethod'] = $webhooksOnChannelAddedMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_channel_added` event using the `webhooks.on_channel_destroyed.method` HTTP method.
     *
     * @param string $webhooksOnChannelDestroyedUrl The URL of the webhook to call
     *                                              in response to the
     *                                              on_channel_added event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelDestroyedUrl($webhooksOnChannelDestroyedUrl) {
        $this->options['webhooksOnChannelDestroyedUrl'] = $webhooksOnChannelDestroyedUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_channel_destroyed.url`.
     *
     * @param string $webhooksOnChannelDestroyedMethod The HTTP method to use when
     *                                                 calling the
     *                                                 webhooks.on_channel_destroyed.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelDestroyedMethod($webhooksOnChannelDestroyedMethod) {
        $this->options['webhooksOnChannelDestroyedMethod'] = $webhooksOnChannelDestroyedMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_channel_updated` event using the `webhooks.on_channel_updated.method` HTTP method.
     *
     * @param string $webhooksOnChannelUpdatedUrl he URL of the webhook to call in
     *                                            response to the
     *                                            on_channel_updated event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelUpdatedUrl($webhooksOnChannelUpdatedUrl) {
        $this->options['webhooksOnChannelUpdatedUrl'] = $webhooksOnChannelUpdatedUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_channel_updated.url`.
     *
     * @param string $webhooksOnChannelUpdatedMethod The HTTP method to use when
     *                                               calling the
     *                                               webhooks.on_channel_updated.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnChannelUpdatedMethod($webhooksOnChannelUpdatedMethod) {
        $this->options['webhooksOnChannelUpdatedMethod'] = $webhooksOnChannelUpdatedMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_channel_updated` event using the `webhooks.on_channel_updated.method` HTTP method.
     *
     * @param string $webhooksOnMemberAddedUrl The URL of the webhook to call in
     *                                         response to the on_channel_updated
     *                                         event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMemberAddedUrl($webhooksOnMemberAddedUrl) {
        $this->options['webhooksOnMemberAddedUrl'] = $webhooksOnMemberAddedUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_channel_updated.url`.
     *
     * @param string $webhooksOnMemberAddedMethod he HTTP method to use when
     *                                            calling the
     *                                            webhooks.on_channel_updated.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMemberAddedMethod($webhooksOnMemberAddedMethod) {
        $this->options['webhooksOnMemberAddedMethod'] = $webhooksOnMemberAddedMethod;
        return $this;
    }

    /**
     * The URL of the webhook to call in response to the `on_member_removed` event using the `webhooks.on_member_removed.method` HTTP method.
     *
     * @param string $webhooksOnMemberRemovedUrl The URL of the webhook to call in
     *                                           response to the on_member_removed
     *                                           event
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMemberRemovedUrl($webhooksOnMemberRemovedUrl) {
        $this->options['webhooksOnMemberRemovedUrl'] = $webhooksOnMemberRemovedUrl;
        return $this;
    }

    /**
     * The HTTP method to use when calling the `webhooks.on_member_removed.url`.
     *
     * @param string $webhooksOnMemberRemovedMethod The HTTP method to use when
     *                                              calling the
     *                                              webhooks.on_member_removed.url
     * @return $this Fluent Builder
     */
    public function setWebhooksOnMemberRemovedMethod($webhooksOnMemberRemovedMethod) {
        $this->options['webhooksOnMemberRemovedMethod'] = $webhooksOnMemberRemovedMethod;
        return $this;
    }

    /**
     * The maximum number of Members that can be added to Channels within this Service. Can be up to 1,000.
     *
     * @param int $limitsChannelMembers The maximum number of Members that can be
     *                                  added to Channels within this Service
     * @return $this Fluent Builder
     */
    public function setLimitsChannelMembers($limitsChannelMembers) {
        $this->options['limitsChannelMembers'] = $limitsChannelMembers;
        return $this;
    }

    /**
     * The maximum number of Channels Users can be a Member of within this Service. Can be up to 1,000.
     *
     * @param int $limitsUserChannels The maximum number of Channels Users can be a
     *                                Member of within this Service
     * @return $this Fluent Builder
     */
    public function setLimitsUserChannels($limitsUserChannels) {
        $this->options['limitsUserChannels'] = $limitsUserChannels;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString() {
        $options = array();
        foreach ($this->options as $key => $value) {
            if ($value != Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Chat.V1.UpdateServiceOptions ' . implode(' ', $options) . ']';
    }
}