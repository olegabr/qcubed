			if ($this-><?php echo $strControlId  ?>) {
				$this-><?php echo $strControlId  ?>_Refresh();
			}
			if ($this-><?php echo $strLabelId ?>) $this-><?php echo $strLabelId ?>->Text = sprintf($this-><?php echo $strObjectName ?>-><?php echo $objColumn->PropertyName ?>) ? $this-><?php echo $strObjectName ?>-><?php echo $objColumn->PropertyName ?>->qFormat($this->str<?php echo $objColumn->PropertyName ?>DateTimeFormat) : null;