<apex:page showHeader="false" controller="ContactUsController" tabstyle="Deal__c">
    
    <div id="hb_main_wrap" class="white-shadow rounded-corners"><!--main wrap start-->


    <div id="hb_main_content" class="full-cont-back"><!--content start-->
      
    
      <div id="hb_subcontent" class="two_col_sub_content">
          

          <div id="contact-content" class="right-col-content"><!--right content start-->
          
                <div id="contact-wrap">
    
                    
                <apex:outputText escape="false" rendered="{!NOT(hasMessages)}"><p style="margin-bottom: 15px;">To send us a message, please fill out the form below.</p></apex:outputText>
                <apex:pageMessages ></apex:pageMessages>
                
        <!--FORM START-->
        <apex:form styleClass="hb-form">
            
            <div class="contact-row first">
                <div class="contact-label">First Name<span class="contact-required">*</span></div>
                <div class="contact-field"><apex:inputText value="{!firstName}"/></div>
                <div class="clear"></div>
            </div>
            <div class="contact-row">
                <div class="contact-label">Last Name<span class="contact-required">*</span></div>
                <div class="contact-field"><apex:inputText value="{!lastName}"/></div>
                <div class="clear"></div>
            </div>
            <div class="contact-row">
                <div class="contact-label">Email Address<span class="contact-required">*</span></div>
                <div class="contact-field"><apex:inputText value="{!email}"/></div>
                <div class="clear"></div>
            </div>
            <div class="contact-row">
                <div class="contact-label">Street Address 1</div>
                <div class="contact-field"><apex:inputText value="{!address1}"/></div>
                <div class="clear"></div>
            </div>
            <div class="contact-row">
                <div class="contact-label">Street Address 2</div>
                <div class="contact-field"><apex:inputText value="{!address2}"/></div>
                <div class="clear"></div>
            </div>
            <div class="contact-row">
                <div class="contact-label">City</div>
                <div class="contact-field"><apex:inputText value="{!city}"/></div>
                <div class="clear"></div>
            </div>
            <div class="contact-row">
                <div class="contact-label">State</div>
                <div class="contact-field">
                    <apex:selectList size="1" value="{!state}" id="stateId">
                       <apex:selectOptions value="{!states}"/>
                    </apex:selectList>
                </div>
                <div class="clear"></div>
            </div>
            <div class="contact-row">
                <div class="contact-label">Postal Code</div>
                <div class="contact-field"><apex:inputText value="{!zip}"/></div>
                <div class="clear"></div>
            </div>
            <div class="contact-row">
                <div class="contact-label">Phone Number</div>
                <div class="contact-field"><apex:inputText value="{!phone}"/></div>
                <div class="clear"></div>
            </div>
            
            <div class="contact-row">
                <div class="contact-label">Sign Up For Newsletter</div>
                <div class="contact-field"><apex:inputCheckbox value="{!newsletter}" style="width:auto;"/>
                <span style="margin-left:8px;">Select if you would like to receive the HB newsletter.</span>
                </div>
                <div class="clear"></div>
            </div>
                
            <div class="contact-row">
                <div class="contact-label">Receive Brochure</div>
                <div class="contact-field">
                    <apex:selectList value="{!brochure}" multiselect="false" size="1" id="brochureId">
                        <apex:selectOptions value="{!brochures}"/>
                    </apex:selectList>
                    <span style="margin-left:10px;">Select which brochure you would like to receive.</span>
                </div>
                <div class="clear"></div>
            </div>                  
                
            <div class="contact-row">
                <div class="contact-label">Brochure Type</div>
                <div class="contact-field">
                    <apex:inputCheckbox value="{!brochureDigital}" style="width:auto;"/>
                    <span style="margin-left:8px; margin-right:20px;">Digital</span>
                    <apex:inputCheckbox value="{!brochurePrinted}" style="width:auto;"/>
                    <span style="margin-left:8px;">Printed. Please include your address.</span>
                </div>
            <div class="clear"></div>
            </div>
            
            <div class="contact-row">
                <div class="contact-label">Call Me</div>
                <div class="contact-field"><apex:inputCheckbox value="{!callMe}" style="width:auto;"/>
                <span style="margin-left:8px;">Select to have our sales department contact you.</span>
                </div>
                <div class="clear"></div>
            </div>
            
            <apex:repeat value="{!$ObjectType.Web_Request__c.FieldSets.Contact_Us}" var="f"> 
                <div class="contact-row">
                    <div class="contact-label">{!f.label}</div>
                    <div class="contact-field"><apex:inputText value="{!theForm[f]}"/></div>
                    <div class="clear"></div>
                </div>
            </apex:repeat>
            
            <div class="contact-row contact-row-last">
                <div class="contact-label">Message</div>
                <div class="contact-field"> <apex:inputTextarea rows="{!IF(hasMessages, 8, 10)}" cols="30" value="{!message}"/> </div>
                <div class="clear"></div>
            </div>
            
            
            
            <div class="contact-row contact-row-last last">
                <div class="contact-label">&nbsp;</div>
                    <apex:outputPanel styleClass="contact-field hb-submit">
                        SUBMIT
                        <apex:actionSupport event="onclick" action="{!saveIt}"/>
                    </apex:outputPanel>
                    
                <div class="clear"></div>
            </div>

                



    </apex:form>
    <!--FORM END-->
                </div>
                 
            </div>
          <!--right content end-->
          
          <div class="clear"></div>
       
        
        <div class="clear"></div>
    
      </div>
    </div>
    <!--content end--> 


   
    </div><!--main wrap end-->





    
    
</apex:page>